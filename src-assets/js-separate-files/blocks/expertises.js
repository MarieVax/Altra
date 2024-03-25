// Create an Intersection Observer instance with a callback function
let observerCard = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Element is intersecting, play animation
        entry.target.classList.add("show");
        const expertiseImage = entry.target.querySelector(
          ".expertises--list_item-image"
        );
        const expertiseTitle = entry.target.querySelector(
          ".expertises--list_item-title"
        );
        const expertiseExcerpt = entry.target.querySelector(
          ".expertises--list_item-excerpt"
        );

        // Ajouter une classe pour faire apparaître les éléments avec décalage
        setTimeout(() => {
          expertiseImage.classList.add("show");
        }, 0); // Décalage pour l'image
        setTimeout(() => {
          expertiseTitle.classList.add("show");
        }, 200); // Décalage pour le titre
        setTimeout(() => {
          expertiseExcerpt.classList.add("show");
        }, 400); // Décalage pour l'extrait
      } //else {
      //   // Element is not intersecting, reverse animation
      //   entry.target.classList.remove("show");
      // }
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
let targetElements = document.querySelectorAll(".expertises--list_item");

// Start observing each target element
targetElements.forEach((element) => {
  observerCard.observe(element);
});
