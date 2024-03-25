// This file contains all the scripts that must be loaded on page load
// This file should be excluded from Delay JS function in WP Rocket settings
// Scripts that can be delayed should go to main.js

//= include ../../node_modules/bigpicture/dist/BigPicture.min.js
//= include ../../node_modules/tua-body-scroll-lock/dist/tua-bsl.umd.min.js

// Variables used in this file
const headerElem = document.querySelector(".js-header");
const panelTrigger = document.querySelector(".js-menu-toggle");
const menu_available =
  typeof panelTrigger != "undefined" && panelTrigger != null ? true : false;
const adminBar = document.getElementById("wpadminbar");
const adminBarEnabled = document.body.contains(adminBar) ? true : false;
const scrollTopButton = document.querySelector(".c-scroll-to-top");
const mobileMenuListItems = document.querySelectorAll("ul.c-mobile-menu li");
const mobileMenuLinks = document.querySelectorAll("ul.c-mobile-menu li > a");
const customViewportCorrectionVariable = "vh";
const body = document.querySelector("body");
const footer = document.querySelector(".js-footer");

// Debounce function
// Example: window.addEventListener('resize', debounce(function() { console.log('Resized'); }, 250));
function debounce(func, delay) {
  let debounceTimer = null;

  return function () {
    // Clear the existing timer if any
    if (debounceTimer) {
      clearTimeout(debounceTimer);
    }
    // Set a new timer
    debounceTimer = setTimeout(() => {
      func.apply(this, arguments);
    }, delay);
  };
}

// Throttle function
function throttle(func, delay) {
  let lastCall = 0;
  return function () {
    const now = new Date().getTime();
    if (now - lastCall < delay) {
      return;
    }
    lastCall = now;
    return func.apply(this, arguments);
  };
}

// Throttle and debounce function (useful when you must run the last call)
function throttleAndDebounce(func, throttleDelay, debounceDelay) {
  let lastCall = 0;
  let debounceTimer = null;

  return function () {
    const now = new Date().getTime();

    // Clearing the previous debounce timer, if any
    if (debounceTimer) {
      clearTimeout(debounceTimer);
    }

    // Setting the debounce timer for the last call
    debounceTimer = setTimeout(() => {
      func.apply(this, arguments);
    }, debounceDelay);

    // Throttle - execution of the function if the specified time has elapsed
    if (now - lastCall >= throttleDelay) {
      lastCall = now;
      return func.apply(this, arguments);
    }
  };
}

document.addEventListener("DOMContentLoaded", function (event) {
  /* Image Lightbox
  ------------------------------------------------------------------------------*/
  document
    .querySelectorAll(
      "a[href$=jpg], a[href$=jpeg], a[href$=jpe], a[href$=png], a[href$=gif]"
    )
    .forEach(function (element) {
      let self = {
        componentEl: element,
        componentHref: element.getAttribute("href"),
      };

      self.options = {
        el: self.componentEl,
        imgSrc: self.componentHref,
        animationEnd: () => {
          bodyScrollLock.lock({ overflowType: "clip" });
        },
        onClose: () => {
          bodyScrollLock.unlock({ overflowType: "clip" });
        },
      };

      self.options = Object.assign(
        self.options,
        self.componentEl.dataset.lightbox
          ? JSON.parse(self.componentEl.dataset.lightbox)
          : {}
      );

      self.componentEl.addEventListener("click", function (event) {
        event.preventDefault();

        BigPicture(self.options);
      });
    });

  /* Video Lightbox
  ------------------------------------------------------------------------------*/
  document
    .querySelectorAll(".js-video-lightbox, .popup-youtube, .popup-video")
    .forEach(function (element) {
      let self = {
        componentEl: element,
        videoID: null,
        mediaType: null,
        componentHref: element.getAttribute("href"),
      };

      self.options = {
        el: self.componentEl,
        dimensions: [1680, 945],
        animationEnd: () => {
          bodyScrollLock.lock({ overflowType: "clip" });
        },
        onClose: () => {
          bodyScrollLock.unlock({ overflowType: "clip" });
        },
      };

      self.parseYouTubeID = function (url) {
        let match = url.match(
          /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/
        );

        return match && match[7].length == 11 ? match[7] : false;
      };

      self.parseVimeoID = function (url) {
        let regExp =
          /^.*(vimeo\.com\/)((channels\/[A-z]+\/)|(groups\/[A-z]+\/videos\/))?([0-9]+)/;
        let parseUrl = regExp.exec(url);

        return parseUrl[5] ? parseUrl[5] : false;
      };

      if (self.componentEl.getAttribute("href").includes("youtu")) {
        self.mediaType = "yt";
        self.videoID = self.parseYouTubeID(
          self.componentEl.getAttribute("href")
        );
        self.options.ytSrc = self.videoID;
        self.options.ytNoCookie = true;
      } else if (self.componentEl.getAttribute("href").includes("vimeo")) {
        self.mediaType = "vimeo";
        self.videoID = self.parseVimeoID(self.componentEl.getAttribute("href"));
        self.options.vimeoSrc = self.videoID;
      } else {
        self.mediaType = "vid";
        self.videoID = self.componentEl.getAttribute("href");
        self.options.vidSrc = self.videoID;
      }

      self.options = Object.assign(
        self.options,
        self.componentEl.dataset.lightbox
          ? JSON.parse(self.componentEl.dataset.lightbox)
          : {}
      );

      self.componentEl.addEventListener("click", function (event) {
        event.preventDefault();

        BigPicture(self.options);
      });
    });

  /* Mobile menu, Off canvas panel
  ------------------------------------------------------------------------------*/

  // Run mobile menu code only if mobile menu is available
  if (menu_available) {
    // Cache elements and properties
    const navWrap = document.querySelector(".js-nav-wrap");
    const panelCover = document.querySelector(".js-cover");
    const panel = document.querySelector(".js-nav");
    const lazyLoadElements = document.querySelectorAll(
      ".js-lazyload-after-panel-open"
    );
    const menuItems = document.querySelectorAll(".menu-item a");

    // Custom Lazy load for panel images
    const lazyLoad = () => {
      lazyLoadElements.forEach((el) => {
        el.setAttribute("src", el.getAttribute("data-src"));
        el.classList.remove("js-lazyload-after-panel-open");
      });
    };

    // Event listener for custom lazy loading on mouseover
    panelTrigger.addEventListener("mouseover", lazyLoad);

    // Setting top padding for menu. It should be the same as website header element.
    const setMenuTopPadding = () => {
      const paddingValue = adminBarEnabled
        ? headerElem.offsetHeight + adminBar.offsetHeight
        : headerElem.offsetHeight;
      navWrap.style.paddingTop = `${paddingValue}px`;
    };
    setMenuTopPadding();

    // Function for showing the mobile menu
    const showPanel = () => {
      setMenuTopPadding();
      document.body.style.overflow = "hidden";
      panelTrigger.classList.add("is-active");
      panelCover.classList.remove("pointer-events-none", "opacity-0");
      panel.classList.remove(
        "-translate-y-full",
        "xs:translate-y-0",
        "xs:translate-x-full"
      );
      panel.classList.add("shadow-xl");
      headerElem.classList.add("is-active");
    };

    // Function for hiding the mobile menu
    const hidePanel = () => {
      panelTrigger.classList.remove("is-active");
      panelCover.classList.add("pointer-events-none", "opacity-0");
      document.body.style.overflow = "";
      panel.classList.add(
        "-translate-y-full",
        "xs:translate-y-0",
        "xs:translate-x-full"
      );
      panel.classList.remove("shadow-xl");
    };

    // Open panel after click in hamburger icon
    panelTrigger.addEventListener("click", () => {
      panelCover.classList.contains("pointer-events-none")
        ? showPanel()
        : hidePanel();
    });

    // Close panel after click in background cover
    panelCover.addEventListener("click", hidePanel);

    // Close panel after pressing escape button on keyboard
    document.addEventListener("keyup", (e) => {
      if (e.key === "Escape" && panelTrigger.classList.contains("is-active")) {
        hidePanel();
      }
    });

    // Close panel after clicking on menu item and link is anchor
    document.addEventListener("click", (e) => {
      if (
        e.target.closest(".menu-item a") &&
        panelTrigger.classList.contains("is-active")
      ) {
        const menuItem = e.target.closest(".menu-item");
        if (!menuItem.classList.contains("menu-item-has-children")) {
          hidePanel();
        }
      }
    });

    // Hide mobile menu if user is changing browser width
    window.addEventListener("resize", debounce(hidePanel, 1000));
  }

  // Function that controls the status of the header depending on the distance from the top of the page
  function setHeaderStatus(scroll) {
    if (scroll >= 1) {
      headerElem.classList.add("js-header--scrolled");
    } else {
      headerElem.classList.remove("js-header--scrolled");
    }
  }

  // Set status during the scroll
  if (headerElem) {
    // Set status when page loads
    setHeaderStatus(window.scrollY);

    // Set status while scrolling with limit on number of calls
    document.addEventListener(
      "scroll",
      throttleAndDebounce(
        function () {
          setHeaderStatus(window.scrollY);
        },
        1000,
        100
      )
    ); // throttleDelay: 1000 ms, debounceDelay: 300 ms
  }

  /* Scroll to top
  ------------------------------------------------------------------------------*/

  // Only proceed if the scroll-to-top button exists
  if (scrollTopButton) {
    // Function to show or hide the scroll-to-top button based on scroll position
    const showHideScrollTopButton = () => {
      if (window.scrollY > 200) {
        scrollTopButton.classList.add("show");
      } else {
        scrollTopButton.classList.remove("show");
      }
    };

    // Listen for scroll events with throttle
    window.addEventListener("scroll", throttle(showHideScrollTopButton, 250));

    // Function to handle the click event and scroll to the top
    const scrollToTop = (event) => {
      event.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    };

    // Listen for click events on the scroll-to-top button
    scrollTopButton.addEventListener("click", scrollToTop);
  }

  /* Accordion in mobile menu
  ------------------------------------------------------------------------------*/

  // Add 'parentLi' class to list items that have sub-menus
  mobileMenuListItems.forEach((item) => {
    if (item.querySelector("ul")) {
      item.classList.add("parentLi");
    }
  });

  // Add 'sub-menu' class to all nested ul elements
  mobileMenuListItems.forEach((item) => {
    const subMenu = item.querySelector("ul");
    if (subMenu) {
      subMenu.classList.add("sub-menu");
    }
  });

  // Toggle class and slide toggle on click
  mobileMenuLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      const parentLi = this.parentNode;

      if (parentLi.classList.contains("parentLi")) {
        this.classList.toggle("expanded");
        const subMenu = parentLi.querySelector(".sub-menu");

        // Toggle expanded class to trigger CSS transition
        subMenu.classList.toggle("expanded");
      }
    });
  });

  /* Hide and show menu on scroll
------------------------------------------------------------------------------*/

  if (headerElem && headerElem.dataset.behaviorWhenScrollingDown === "hide") {
    let prevScroll = window.scrollY || document.documentElement.scrollTop;
    let curScroll;
    let direction = 0;
    let prevDirection = 0;

    const checkScroll = function () {
      // Find the direction of scroll: 0 - initial, 1 - up, 2 - down
      curScroll = window.scrollY || document.documentElement.scrollTop;
      if (curScroll > prevScroll) {
        direction = 2;
      } else if (curScroll < prevScroll) {
        direction = 1;
      }

      if (direction !== prevDirection) {
        toggleHeader(direction, curScroll);
      }

      prevScroll = curScroll;
    };

    const toggleHeader = function (direction, curScroll) {
      // Replace 52 with the height of your header in pixels
      if (direction === 2 && curScroll > 52) {
        headerElem.classList.add("-translate-y-full");
        prevDirection = direction;
      } else if (direction === 1) {
        headerElem.classList.remove("-translate-y-full");
        prevDirection = direction;
      }
    };

    // Add an event listener using the throttle and debounce function
    window.addEventListener(
      "scroll",
      throttleAndDebounce(checkScroll, 100, 1000)
    );
  }

  /* Viewport height CSS variable
------------------------------------------------------------------------------*/

  function setViewportProperty(doc) {
    var prevClientHeight;
    var customVar = "--" + (customViewportCorrectionVariable || "vh");

    // The handleResize function
    function handleResize() {
      var clientHeight = doc.clientHeight;
      if (clientHeight === prevClientHeight) return;
      requestAnimationFrame(function updateViewportHeight() {
        doc.style.setProperty(customVar, clientHeight * 0.01 + "px");
        prevClientHeight = clientHeight;
      });
    }

    // Initial call to handleResize
    handleResize();

    // Return debounced function to optimize performance
    return debounce(handleResize, 250);
  }

  // Attach the event listener with the debounced function
  window.addEventListener(
    "resize",
    setViewportProperty(document.documentElement)
  );

  /* If the content is insufficient to fill the entire screen, ensure that the footer expands to occupy the remaining space.
------------------------------------------------------------------------------*/

  // Function to adjust the footer height
  function fixFooter() {
    // Get the initial sizes
    const initialBodyHeight = document.body.offsetHeight;
    const windowHeight = window.innerHeight;

    // Reset the footer's minHeight before recalculating
    footer.style.minHeight = "auto";

    // Recalculate the body height after reset
    const recalculatedBodyHeight = document.body.offsetHeight;

    // Condition to check and adjust the footer height
    if (recalculatedBodyHeight < windowHeight) {
      const footerHeight = footer.offsetHeight;
      const contentHeight = recalculatedBodyHeight - footerHeight;
      const newFooterHeight = windowHeight - contentHeight;

      // Apply the new height to the footer
      footer.style.minHeight = `${newFooterHeight}px`;
    }
  }

  // Call fixFooter initially
  fixFooter();

  // Debounced resize event
  window.addEventListener(
    "resize",
    debounce(function () {
      fixFooter();
    }, 250)
  ); // 250 ms debounce time
});
