// This file contains all the scripts that must be loaded on page load
// This file should be excluded from Delay JS function in WP Rocket settings
// Scripts that can be delayed should go to main.js

var BigPicture=function(){var t,n,e,o,i,r,a,c,p,s,l,d,u,f,m,b,g,h,x,v,y,w,_,T,k,M,S,L,E,A,C,H,z,I=[],D={},O="appendChild",V="createElement",N="removeChild";function W(){var n=t.getBoundingClientRect();return"transform:translate3D("+(n.left-(e.clientWidth-n.width)/2)+"px, "+(n.top-(e.clientHeight-n.height)/2)+"px, 0) scale3D("+t.clientWidth/o.clientWidth+", "+t.clientHeight/o.clientHeight+", 0)"}function q(t){var n=A.length-1;if(!u){if(t>0&&E===n||t<0&&!E){if(!z.loop)return j(i,""),void setTimeout(j,9,i,"animation:"+(t>0?"bpl":"bpf")+" .3s;transition:transform .35s");E=t>0?-1:n+1}if([(E=Math.max(0,Math.min(E+t,n)))-1,E,E+1].forEach(function(t){if(t=Math.max(0,Math.min(t,n)),!D[t]){var e=A[t].src,o=document[V]("IMG");o.addEventListener("load",F.bind(null,e)),o.src=e,D[t]=o}}),D[E].complete)return B(t);u=1,j(m,"opacity:.4;"),e[O](m),D[E].onload=function(){y&&B(t)},D[E].onerror=function(){A[E]={error:"Error loading image"},y&&B(t)}}}function B(n){u&&(e[N](m),u=0);var r=A[E];if(r.error)alert(r.error);else{var a=e.querySelector("img:last-of-type");j(i=o=D[E],"animation:"+(n>0?"bpfl":"bpfr")+" .35s;transition:transform .35s"),j(a,"animation:"+(n>0?"bpfol":"bpfor")+" .35s both"),e[O](i),r.el&&(t=r.el)}C.innerHTML=E+1+"/"+A.length,X(A[E].caption),M&&M([i,A[E]])}function P(){var t,n,e=.95*window.innerHeight,o=.95*window.innerWidth,i=z.dimensions||[1920,1080],r=i[0],a=i[1],p=a/r;p>e/o?n=(t=Math.min(a,e))/p:t=(n=Math.min(r,o))*p,c.style.cssText+="width:"+n+"px;height:"+t+"px;"}function G(t){~[1,4].indexOf(o.readyState)?(U(),setTimeout(function(){o.play()},99)):o.error?U(t):f=setTimeout(G,35,t)}function R(n){z.noLoader||(n&&j(m,"top:"+t.offsetTop+"px;left:"+t.offsetLeft+"px;height:"+t.clientHeight+"px;width:"+t.clientWidth+"px"),t.parentElement[n?O:N](m),u=n)}function X(t){t&&(g.innerHTML=t),j(b,"opacity:"+(t?"1;pointer-events:auto":"0"))}function F(t){!~I.indexOf(t)&&I.push(t)}function U(t){if(u&&R(),T&&T(),"string"==typeof t)return $(),z.onError?z.onError():alert("Error: The requested "+t+" could not be loaded.");_&&F(s),o.style.cssText+=W(),j(e,"opacity:1;pointer-events:auto"),k&&(k=setTimeout(k,410)),v=1,y=!!A,setTimeout(function(){o.style.cssText+="transition:transform .35s;transform:none",h&&setTimeout(X,250,h)},60)}function Y(t){var n=t?t.target:e,i=[b,x,r,a,g,L,S,m];n.blur(),w||~i.indexOf(n)||(o.style.cssText+=W(),j(e,"pointer-events:auto"),setTimeout($,350),clearTimeout(k),v=0,w=1)}function $(){if((o===c?p:o).removeAttribute("src"),document.body[N](e),e[N](o),j(e,""),j(o,""),X(0),y){for(var t=e.querySelectorAll("img"),n=0;n<t.length;n++)e[N](t[n]);u&&e[N](m),e[N](C),y=A=0,D={},H||e[N](S),H||e[N](L),i.onload=U,i.onerror=U.bind(null,"image")}z.onClose&&z.onClose(),w=u=0}function j(t,n){t.style.cssText=n}return function(w){var D;return n||function(t){var s,d;function f(t){var n=document[V]("button");return n.className=t,n.innerHTML='<svg viewBox="0 0 48 48"><path d="M28 24L47 5a3 3 0 1 0-4-4L24 20 5 1a3 3 0 1 0-4 4l19 19L1 43a3 3 0 1 0 4 4l19-19 19 19a3 3 0 0 0 4 0v-4L28 24z"/></svg>',n}function h(t,n){var e=document[V]("button");return e.className="bp-lr",e.innerHTML='<svg viewBox="0 0 129 129" height="70" fill="#fff"><path d="M88.6 121.3c.8.8 1.8 1.2 2.9 1.2s2.1-.4 2.9-1.2a4.1 4.1 0 0 0 0-5.8l-51-51 51-51a4.1 4.1 0 0 0-5.8-5.8l-54 53.9a4.1 4.1 0 0 0 0 5.8l54 53.9z"/></svg>',j(e,n),e.onclick=function(n){n.stopPropagation(),q(t)},e}var w=document[V]("STYLE");w.innerHTML="#bp_caption,#bp_container{bottom:0;left:0;right:0;position:fixed;opacity:0}#bp_container>*,#bp_loader{position:absolute;right:0;z-index:10}#bp_container,#bp_caption,#bp_container svg{pointer-events:none}#bp_container{top:0;z-index:9999;background:"+(t&&t.overlayColor?t.overlayColor:"rgba(0,0,0,.7)")+";opacity:0;transition:opacity .35s}#bp_loader{top:0;left:0;bottom:0;display:flex;align-items:center;cursor:wait;background:0;z-index:9}#bp_loader svg{width:50%;max-width:300px;max-height:50%;margin:auto;animation:bpturn 1s infinite linear}#bp_aud,#bp_container img,#bp_sv,#bp_vid{user-select:none;max-height:96%;max-width:96%;top:0;bottom:0;left:0;margin:auto;box-shadow:0 0 3em rgba(0,0,0,.4);z-index:-1}#bp_sv{background:#111}#bp_sv svg{width:66px}#bp_caption{font-size:.9em;padding:1.3em;background:rgba(15,15,15,.94);color:#fff;text-align:center;transition:opacity .3s}#bp_aud{width:650px;top:calc(50% - 20px);bottom:auto;box-shadow:none}#bp_count{left:0;right:auto;padding:14px;color:rgba(255,255,255,.7);font-size:22px;cursor:default}#bp_container button{position:absolute;border:0;outline:0;background:0;cursor:pointer;transition:all .1s}#bp_container>.bp-x{padding:0;height:41px;width:41px;border-radius:100%;top:8px;right:14px;opacity:.8;line-height:1}#bp_container>.bp-x:focus,#bp_container>.bp-x:hover{background:rgba(255,255,255,.2)}.bp-x svg,.bp-xc svg{height:21px;width:20px;fill:#fff;vertical-align:top;}.bp-xc svg{width:16px}#bp_container .bp-xc{left:2%;bottom:100%;padding:9px 20px 7px;background:#d04444;border-radius:2px 2px 0 0;opacity:.85}#bp_container .bp-xc:focus,#bp_container .bp-xc:hover{opacity:1}.bp-lr{top:50%;top:calc(50% - 130px);padding:99px 0;width:6%;background:0;border:0;opacity:.4;transition:opacity .1s}.bp-lr:focus,.bp-lr:hover{opacity:.8}@keyframes bpf{50%{transform:translatex(15px)}100%{transform:none}}@keyframes bpl{50%{transform:translatex(-15px)}100%{transform:none}}@keyframes bpfl{0%{opacity:0;transform:translatex(70px)}100%{opacity:1;transform:none}}@keyframes bpfr{0%{opacity:0;transform:translatex(-70px)}100%{opacity:1;transform:none}}@keyframes bpfol{0%{opacity:1;transform:none}100%{opacity:0;transform:translatex(-70px)}}@keyframes bpfor{0%{opacity:1;transform:none}100%{opacity:0;transform:translatex(70px)}}@keyframes bpturn{0%{transform:none}100%{transform:rotate(360deg)}}@media (max-width:600px){.bp-lr{font-size:15vw}}",document.head[O](w),(e=document[V]("DIV")).id="bp_container",e.onclick=Y,l=f("bp-x"),e[O](l),"ontouchend"in window&&window.visualViewport&&(H=1,e.ontouchstart=function(t){var n=t.touches,e=t.changedTouches;d=n.length>1,s=e[0].pageX},e.ontouchend=function(t){var n=t.changedTouches;if(y&&!d&&window.visualViewport.scale<=1){var e=n[0].pageX-s;e<-30&&q(1),e>30&&q(-1)}}),i=document[V]("IMG"),(r=document[V]("VIDEO")).id="bp_vid",r.setAttribute("playsinline",1),r.controls=1,r.loop=1,(a=document[V]("audio")).id="bp_aud",a.controls=1,a.loop=1,(C=document[V]("span")).id="bp_count",(b=document[V]("DIV")).id="bp_caption",(x=f("bp-xc")).onclick=X.bind(null,0),b[O](x),g=document[V]("SPAN"),b[O](g),e[O](b),S=h(1,"transform:scalex(-1)"),L=h(-1,"left:0;right:auto"),(m=document[V]("DIV")).id="bp_loader",m.innerHTML='<svg viewbox="0 0 32 32" fill="#fff" opacity=".8"><path d="M16 0a16 16 0 0 0 0 32 16 16 0 0 0 0-32m0 4a12 12 0 0 1 0 24 12 12 0 0 1 0-24" fill="#000" opacity=".5"/><path d="M16 0a16 16 0 0 1 16 16h-4A12 12 0 0 0 16 4z"/></svg>',(c=document[V]("DIV")).id="bp_sv",(p=document[V]("IFRAME")).setAttribute("allowfullscreen",1),p.allow="autoplay; fullscreen",p.onload=function(){return c[N](m)},j(p,"border:0;position:absolute;height:100%;width:100%;left:0;top:0"),c[O](p),i.onload=U,i.onerror=U.bind(null,"image"),window.addEventListener("resize",function(){y||u&&R(1),o===c&&P()}),document.addEventListener("keyup",function(t){var n=t.keyCode;27===n&&v&&Y(),y&&(39===n&&q(1),37===n&&q(-1),38===n&&q(10),40===n&&q(-10))}),document.addEventListener("keydown",function(t){y&&~[37,38,39,40].indexOf(t.keyCode)&&t.preventDefault()}),document.addEventListener("focus",function(t){v&&!e.contains(t.target)&&(t.stopPropagation(),l.focus())},1),n=1}(w),u&&(clearTimeout(f),$()),z=w,d=w.ytSrc||w.vimeoSrc,T=w.animationStart,k=w.animationEnd,M=w.onChangeImage,_=0,h=(t=w.el).getAttribute("data-caption"),w.gallery?function(n,r){var a=z.galleryAttribute||"data-bp";if(Array.isArray(n))A=n,h=n[E=r||0].caption;else{var c=(A=[].slice.call("string"==typeof n?document.querySelectorAll(n+" ["+a+"]"):n)).indexOf(t);E=0===r||r?r:-1!==c?c:0,A=A.map(function(t){return{el:t,src:t.getAttribute(a),caption:t.getAttribute("data-caption")}})}_=1,!~I.indexOf(s=A[E].src)&&R(1),A.length>1?(e[O](C),C.innerHTML=E+1+"/"+A.length,H||(e[O](S),e[O](L))):A=0,(o=i).src=s}(w.gallery,w.position):d||w.iframeSrc?(o=c,z.ytSrc?W="https://www.youtube"+(z.ytNoCookie?"-nocookie":"")+".com/embed/"+d+"?html5=1&rel=0&playsinline=1&autoplay=1":z.vimeoSrc?W="https://player.vimeo.com/video/"+d+"?autoplay=1":z.iframeSrc&&(W=z.iframeSrc),j(m,""),c[O](m),p.src=W,P(),setTimeout(U,9)):w.imgSrc?(_=1,!~I.indexOf(s=w.imgSrc)&&R(1),(o=i).src=s):w.audio?(R(1),(o=a).src=w.audio,G("audio file")):w.vidSrc?(R(1),w.dimensions&&j(r,"width:"+w.dimensions[0]+"px"),D=w.vidSrc,Array.isArray(D)?(o=r.cloneNode(),D.forEach(function(t){var n=document[V]("SOURCE");n.src=t,n.type="video/"+t.match(/.(\w+)$/)[1],o[O](n)})):(o=r).src=D,G("video")):(o=i).src="IMG"===t.tagName?t.src:window.getComputedStyle(t).backgroundImage.replace(/^url|[(|)|'|"]/g,""),e[O](o),document.body[O](e),{close:Y,opts:z,updateDimensions:P,display:o,next:function(){return q(1)},prev:function(){return q(-1)}};var W}}();

/**
 * tua-body-scroll-lock v1.4.0
 * (c) 2023 Evinma, BuptStEve
 * @license MIT
 */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t((e="undefined"!=typeof globalThis?globalThis:e||self).bodyScrollLock={})}(this,(function(e){"use strict";var t=function(){return"undefined"==typeof window},o=function(e){e=e||navigator.userAgent;var t=/(iPad).*OS\s([\d_]+)/.test(e);return{ios:!t&&/(iPhone\sOS)\s([\d_]+)/.test(e)||t,android:/(Android);?[\s/]+([\d.]+)?/.test(e)}};var n=0,i=0,r=0,s=null,l=!1,c=[],d=function(e){if(t())return!1;if(!e)throw new Error("options must be provided");var o=!1,n={get passive(){o=!0}},i=function(){},r="__TUA_BSL_TEST_PASSIVE__";window.addEventListener(r,i,n),window.removeEventListener(r,i,n);var s=e.capture;return o?e:void 0!==s&&s}({passive:!1}),u=!t()&&"scrollBehavior"in document.documentElement.style,f=function(e){e.cancelable&&e.preventDefault()};e.clearBodyLocks=function(){if(!t())if(n=0,o().ios||"function"!=typeof s){if(c.length)for(var e=c.pop();e;)e.ontouchmove=null,e.ontouchstart=null,e=c.pop();l&&(document.removeEventListener("touchmove",f,d),l=!1)}else s()},e.lock=function(e,a){if(!t()){if(o().ios){if(e)(Array.isArray(e)?e:[e]).forEach((function(e){e&&-1===c.indexOf(e)&&(e.ontouchstart=function(e){i=e.targetTouches[0].clientY,r=e.targetTouches[0].clientX},e.ontouchmove=function(t){1===t.targetTouches.length&&function(e,t){if(t){var o=t.scrollTop,n=t.scrollLeft,s=t.scrollWidth,l=t.scrollHeight,c=t.clientWidth,d=t.clientHeight,u=e.targetTouches[0].clientX-r,a=e.targetTouches[0].clientY-i,h=Math.abs(a)>Math.abs(u);if(h&&(a>0&&0===o||a<0&&o+d+1>=l)||!h&&(u>0&&0===n||u<0&&n+c+1>=s))return f(e)}e.stopPropagation()}(t,e)},c.push(e))}));l||(document.addEventListener("touchmove",f,d),l=!0)}else n<=0&&(s=o().android?function(e){var t=document.documentElement,o=document.body,n=t.scrollTop||o.scrollTop,i=Object.assign({},t.style),r=Object.assign({},o.style);return t.style.height="100%",t.style.overflow="hidden",o.style.top="-".concat(n,"px"),o.style.width="100%",o.style.height="auto",o.style.position="fixed",o.style.overflow=(null==e?void 0:e.overflowType)||"hidden",function(){t.style.height=i.height||"",t.style.overflow=i.overflow||"",["top","width","height","overflow","position"].forEach((function(e){o.style[e]=r[e]||""}));var e={top:n,behavior:"instant"};u?window.scrollTo(e):window.scrollTo(0,n)}}(a):(h=document.documentElement,v=Object.assign({},h.style),p=window.innerWidth-h.clientWidth,y=parseInt(window.getComputedStyle(h).paddingRight,10),h.style.overflow="hidden",h.style.boxSizing="border-box",h.style.paddingRight="".concat(p+y,"px"),function(){["overflow","boxSizing","paddingRight"].forEach((function(e){h.style[e]=v[e]||""}))}));var h,v,p,y;n+=1}},e.unlock=function(e){if(!(t()||(n-=1)>0))if(o().ios||"function"!=typeof s){if(e)(Array.isArray(e)?e:[e]).forEach((function(e){var t=c.indexOf(e);-1!==t&&(e.ontouchmove=null,e.ontouchstart=null,c.splice(t,1))}));l&&(document.removeEventListener("touchmove",f,d),l=!1)}else s()}}));


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

//# sourceMappingURL=onload.js.map
