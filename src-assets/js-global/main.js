/*******************************************************************************

  Project: altra
  Author:  WHAT.DIGITAL
  Date:    PROJECT_DATE

********************************************************************************

TOC:
  Fix "Does not use passive listeners to improve scrolling performance" issue in the PageSpeed Insights
  
  jQuery document ready start
  Dropdown Menu
  Map
  Equal Heights
  AJAX Load More
  jQuery document ready end

*******************************************************************************/

// Fix "Does not use passive listeners to improve scrolling performance" issue in the PageSpeed Insights

jQuery.event.special.touchstart = {
  setup: function (_, ns, handle) {
    this.addEventListener("touchstart", handle, {
      passive: !ns.includes("noPreventDefault"),
    });
  },
};

jQuery.event.special.touchmove = {
  setup: function (_, ns, handle) {
    this.addEventListener("touchmove", handle, {
      passive: !ns.includes("noPreventDefault"),
    });
  },
};

jQuery.event.special.wheel = {
  setup: function (_, ns, handle) {
    this.addEventListener("wheel", handle, { passive: true });
  },
};

jQuery.event.special.mousewheel = {
  setup: function (_, ns, handle) {
    this.addEventListener("mousewheel", handle, { passive: true });
  },
};

jQuery(document).ready(function ($) {
  /* Dropdown Menu
------------------------------------------------------------------------------*/

  if ($(".c-hor-menu").length) {
    $(".c-hor-menu .menu-item-has-children > a").on("click", function (e) {
      e.preventDefault();
      if (!$(this).parent().hasClass("opened")) {
        $(this).closest(".c-hor-menu").find(".opened").removeClass("opened");
        $(this).parent().addClass("opened");
      } else {
        $(this).parent().removeClass("opened");
      }
    });
  }

  // Hide dropdown after click outside the menu
  $(document).on("click", function (event) {
    if (
      !$(event.target).closest(".c-hor-menu .menu-item-has-children a").length
    ) {
      $(".c-hor-menu .menu-item-has-children").removeClass("opened");
    }
  });

  /* Map
/*******************************************************************************/

  $.each($(".dyn-map"), function () {
    var lat = $(this).data("lat");
    var long = $(this).data("long");
    var zoom = $(this).data("zoom");

    L.Icon.Default.imagePath =
      theme_settings.template_dir + "/assets/img/leaflet/";
    var mymap = new L.map($(this)[0], {
      scrollWheelZoom: false,
    }).setView([lat, long], 16);

    // create custom icon
    var pinIcon = L.icon({
      iconUrl: theme_settings.template_dir + "/assets/img/leaflet/pin.svg",
      shadowUrl:
        theme_settings.template_dir + "/assets/img/leaflet/marker-shadow.png",
      iconSize: [40, 50], // size of the icon
      iconAnchor: [16, 50],
      shadowAnchor: [10, 39],
      popupAnchor: [5, -48],
    });

    // Open Street Map
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
      maxZoom: zoom,
    }).addTo(mymap);

    if ($(this).data("popup")) {
      L.marker([lat, long], { icon: pinIcon })
        .addTo(mymap)
        .bindPopup($(this).data("popup"))
        .openPopup();
    }

    // Open Street Map - Wikimedia
    // L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}{r}.png', {
    //     attribution: '<a href="https://wikimediafoundation.org/wiki/Maps_Terms_of_Use">Wikimedia</a>',
    //     maxZoom: zoom
    // }).addTo(mymap);

    // Open Street Map - Black and White
    /*
    L.tileLayer('http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        maxZoom: zoom
    }).addTo(mymap);
    */

    // Mapbox - remember to change accessToken
    /*
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data © <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: zoom,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYWRhbXBpbGNoIiwiYSI6ImNqbTY0aGlzeTB0eTEza280dGVpcjVnemMifQ.zZjr5GSWWpe4lYGBjvuz1A'
    }).addTo(mymap);
    */

    mymap.on("click", function () {
      if (mymap.scrollWheelZoom.enabled()) {
        mymap.scrollWheelZoom.disable();
      } else {
        mymap.scrollWheelZoom.enable();
      }
    });
  });

  /* Equal Heights
------------------------------------------------------------------------------*/

  // Example:
  // $('.something').matchHeight();

  // Match Height compatibility with Lazy Load techniques
  // In most cases this code is not required if all images have width and haight dimmensions provided
  // function refreshMatchHeight() {
  //   $.fn.matchHeight._update();
  // }
  // $('img').on('load', throttle(refreshMatchHeight, 1000));

  /* AJAX Load More
------------------------------------------------------------------------------*/

  $(".js-load-more").click(function () {
    var button = $(this);
    var content_place = $(this).parent();
    var data = {
      action: "ajax_load_more",
      query: theme_settings.posts,
      page: theme_settings.current_page,
    };

    if (
      !(
        button.hasClass("c-btn--post-loading-loader") ||
        button.hasClass("c-btn--post-no-more-posts")
      )
    ) {
      $.ajax({
        url: theme_settings.ajaxurl,
        data: data,
        type: "POST",
        beforeSend: function (xhr) {
          button
            .addClass("c-btn--post-loading-loader")
            .find("span")
            .html(theme_settings.loading);
        },
        success: function (data) {
          var tempScrollTop = $(window).scrollTop();
          if (data.length) {
            button
              .removeClass("c-btn--post-loading-loader")
              .find("span")
              .html(theme_settings.loadmore);
            $(data).insertBefore(content_place);
            theme_settings.current_page++;

            if (theme_settings.current_page == theme_settings.max_page)
              button
                .removeClass("c-btn--post-loading-loader")
                .addClass("c-btn--post-no-more-posts")
                .find("span")
                .html(theme_settings.noposts);
          } else {
            button
              .removeClass("c-btn--post-loading-loader")
              .addClass("c-btn--post-no-more-posts")
              .find("span")
              .html(theme_settings.noposts);
          }
          $(window).scrollTop(tempScrollTop);
        },
      });
    }
  });

  /* Display Modal on click and open tab on click on buttons
------------------------------------------------------------------------------*/
  function openModal(tabName) {
    $(".modal").fadeIn(); // Effet de fondu pour afficher la modal
    openTab(tabName);
    // Appelle la fonction openTab pour activer la tab spécifiée
  }

  // Fonction pour ouvrir la modal avec la tab1 active
  $("#btn1, .c-btn-footer-block-right").on("click", function (event) {
    event.preventDefault();
    openModal("tab1");
  });

  $("#btn2").on("click", function (event) {
    event.preventDefault();
    openModal("tab2");
  });

  $(document).on("click", function (event) {
    if (
      !$(event.target).closest(".modal-container").length ||
      $(event.target).hasClass("close")
    ) {
      if (
        $(event.target).hasClass("btn-fixed-elem") ||
        $(event.target).hasClass("btn-fixed-img") ||
        $(event.target).hasClass("btn-fixed-txt") ||
        $(event.target).hasClass("c-btn-footer-block-right")
      ) {
        return; // Si l'élément cliqué est un des éléments spécifiques, ne faites rien
      }
      $(".modal").fadeOut();
    }
  });

  function openTab(tabName) {
    // Récupère tous les éléments avec la classe "modal-container-forms-tab" et les cache
    $(".modal-container-forms-tab").removeClass("active");

    // Récupère tous les éléments avec la classe "tablink" et supprime la classe "active"
    $(".modal-container-forms-btn").removeClass("active");

    // Affiche le contenu de l'onglet sélectionné avec un fade in progressif
    $("#" + tabName).addClass("active");

    // Ajoute la classe "active" au lien correspondant au nom de l'onglet (tabName)
    $("#" + tabName + "-btn").addClass("active");
  }

  $("#tab1-btn").on("click", function () {
    openTab("tab1");
  });

  $("#tab2-btn").on("click", function () {
    openTab("tab2");
  });

  /* Remove placeholder on click on input and textarea
------------------------------------------------------------------------------*/

  // Attach a focus event handler to input and textarea elements
  $("input, textarea").on("focus", function () {
    // Store the current placeholder text in a data attribute
    if (!$(this).data("original-placeholder")) {
      $(this).data("original-placeholder", $(this).attr("placeholder"));
    }

    // Clear the placeholder text
    $(this).attr("placeholder", "");
  });

  // Attach a blur event handler to input and textarea elements
  $("input, textarea").on("blur", function () {
    // Get the current value of the input
    var currentValue = $(this).val();

    // Restore the original placeholder text only if the input is empty
    if (!currentValue) {
      var originalPlaceholder = $(this).data("original-placeholder");
      $(this).attr("placeholder", originalPlaceholder);
    }
  });

  /**
   Footer FadeIn
   */
  // Create an Intersection Observer instance with a callback function
  let observerFooter = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Element is intersecting, play animation

          entry.target.classList.add("show");

          const blockHeading = entry.target.querySelector(
            ".footer-block-content-heading"
          );
          const blockText = entry.target.querySelector(
            ".footer-block-content-text"
          );
          const blockLinks = entry.target.querySelector(
            ".footer-block-content-links"
          );

          // Ajouter une classe pour faire apparaître les éléments avec décalage
          setTimeout(() => {
            blockHeading.classList.add("show");
          }, 0); // Décalage pour l'image
          setTimeout(() => {
            blockText.classList.add("show");
          }, 200); // Décalage pour le titre
          setTimeout(() => {
            blockLinks.classList.add("show");
          }, 400);
        }
      });
    },
    {
      // Set the rootMargin to create an offset when checking for intersection
      rootMargin: "0px",
      // Set the threshold to 0 to trigger the callback as soon as even a single pixel of the target element is visible
      threshold: 0.5,
    }
  );

  // Select the element(s) to observe
  let targetFooter = document.querySelectorAll(".footer-block-content");

  // Start observing each target element
  targetFooter.forEach((element) => {
    observerFooter.observe(element);
  });
}); // end of jQuery code
