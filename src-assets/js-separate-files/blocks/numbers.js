// Create an Intersection Observer instance with a callback function
let observerBtn = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Element is intersecting, play animation

        setTimeout(() => {
          entry.target.classList.add("show");
        }, 500);
      }
    });
  },
  {
    // Set the rootMargin to create an offset when checking for intersection
    rootMargin: "0px",
    // Set the threshold to 0 to trigger the callback as soon as even a single pixel of the target element is visible
    threshold: 0.7,
  }
);

// Select the element(s) to observe
let targetBtn = document.querySelectorAll(".c-btn-numbers");

// Start observing each target element
targetBtn.forEach((element) => {
  observerBtn.observe(element);
});
