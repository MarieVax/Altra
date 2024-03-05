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
}); // end of jQuery code
//# sourceMappingURL=main.js.map
