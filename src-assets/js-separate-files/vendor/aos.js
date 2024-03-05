//= include ../../../node_modules/aos/dist/aos.js

AOS.init({
  disable: 'mobile',
  once: true
});

window.addEventListener('load', AOS.refresh);

function refreshAOS() {
  AOS.refresh();
}

// Recalculate AOS after body height change

// onElementHeightChange(document.body, function(){
//   AOS.refresh();
// });

// function onElementHeightChange(elm, callback) {
//   var lastHeight = elm.clientHeight
//   var newHeight;
  
//   (function run() {
//       newHeight = elm.clientHeight;      
//       if (lastHeight !== newHeight) callback();
//       lastHeight = newHeight;

//       if (elm.onElementHeightChangeTimer) {
//         clearTimeout(elm.onElementHeightChangeTimer); 
//       }

//       elm.onElementHeightChangeTimer = setTimeout(run, 200);
//   })();
// }