// // Create an Intersection Observer instance with a callback function
// let observerBtn = new IntersectionObserver(
//   (entries, observer) => {
//     entries.forEach((entry) => {
//       if (entry.isIntersecting) {
//         setTimeout(() => {
//           entry.target.classList.add("show");
//         }, 500); // Utilise le délai par défaut
//       }
//     });
//   },
//   {
//     // Set the rootMargin to create an offset when checking for intersection
//     rootMargin: "0px",
//     // Set the threshold to 0 to trigger the callback as soon as even a single pixel of the target element is visible
//     threshold: 0.9,
//   }
// );

// // Select the element(s) to observe
// let targetElem = document.querySelectorAll(".fadeIn");

// // Start observing each target element
// targetElem.forEach((element) => {
//   observerBtn.observe(element);
// });

// // Création de l'Intersection Observer
// let observerMoney = new IntersectionObserver(
//   (entries, observer) => {
//     entries.forEach((entry) => {
//       // Vérification si l'élément est dans la vue
//       if (entry.isIntersecting) {
//         // Récupération des éléments enfants
//         let children = entry.target.querySelectorAll(
//           ".numbers--money_retrieved-100, .numbers--money_retrieved-200, .numbers--money_retrieved-300"
//         );

//         // Ajout de la classe "show" aux éléments enfants après des délais
//         children.forEach((child, index) => {
//           setTimeout(() => {
//             child.classList.add("show");
//           }, index * 500); // Délai en millisecondes, 1000ms = 1 seconde
//         });

//         // Arrêt de l'observation après traitement
//         observer.unobserve(entry.target);
//       }
//     });
//   },
//   {
//     // Set the rootMargin to create an offset when checking for intersection
//     rootMargin: "0px",
//     // Set the threshold to 0 to trigger the callback as soon as even a single pixel of the target element is visible
//     threshold: 0.9,
//   }
// );

// // Sélection de la div à observer
// let targetMoney = document.querySelector(".numbers--money_retrieved");

// // Démarrage de l'observation
// observerMoney.observe(targetMoney);

//# sourceMappingURL=numbers.js.map
