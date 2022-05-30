import MultiSwitcher from "./MultiSwitcher.js";
MultiSwitcher.initAll();

import Modal from "./Modal.js";
Modal.initAll();

import Tablist from "./Tablist.js";
Tablist.initAll();

// document.querySelectorAll("[data-select]").forEach((elem) => {
//    elem.addEventListener("change", (e) => {
//       console.log(e);
//    });
// });

import Select from "./Select.js";
window.Select = Select;
Select.initAll();
console.log(Select.instances);

import Dropdown from "./Dropdown.js";
Dropdown.initAll();
Dropdown.get("cover-materials")?.on("open", (e) => {
   let layouts = document.getElementById("covers-layouts");
   layouts.style.setProperty("--height", layouts.scrollHeight + "px");
});

// let modal = Modal.get("ask-question");
// modal.on("beforeClose", ({ detail }) => {
//    // for (let index = 0; index < 9999999; index++) {
//    //    // const element = array[index];
//    // }
//    // modal.closeable = false;
//    console.log("onCheck");
// });

import { Swiper, Pagination, EffectFade, Autoplay } from "swiper";
Swiper.use([Pagination, EffectFade, Autoplay]);

document.querySelectorAll(`[data-slider="reviews"]`).forEach((wrapper) => {
   const breakpoint = window.matchMedia("(min-width:1023px)");
   let mySwiper;
   const breakpointChecker = function () {
      if (breakpoint.matches === true) {
         if (mySwiper !== undefined) mySwiper.destroy(true, true);

         return;
      } else if (breakpoint.matches === false) {
         return enableSwiper();
      }
   };

   const enableSwiper = function () {
      mySwiper = new Swiper(wrapper.querySelector(".swiper-container"), {
         speed: 700,
         keyboard: true,
         loop: false,
         slidesPerView: 1.1,
         spaceBetween: 8,
         observer: true,
         slideToClickedSlide: true,
         slidesPerView: 1,
         spaceBetween: 20,
         breakpoints: {
            768: {
               slidesPerView: 2,
            },
         },
         pagination: {
            el: wrapper.querySelector(".swiper-pagination"),
            clickable: true,
         },
      });
   };

   breakpoint.addEventListener("change", breakpointChecker);
   breakpointChecker();
});

document.querySelectorAll(`[data-slider="main"]`).forEach((wrapper) => {
   new Swiper(wrapper.querySelector(".swiper-container"), {
      speed: 500,
      keyboard: true,
      loop: false,
      slidesPerView: 1.1,
      spaceBetween: 8,
      observer: true,
      slideToClickedSlide: true,
      slidesPerView: 1,
      effect: "fade",
      fadeEffect: {
         crossFade: true,
      },
      autoplay: {
         delay: 5000,
      },
      pagination: {
         el: wrapper.querySelector(".swiper-pagination"),
         clickable: true,
      },
   });
});

let cover = document.querySelector(".photobook-cover-wrapper, .photos-cover, .card-cover-wrapper");
if (cover) {
   let setWidth = (elem) => {
      elem.style.setProperty("--cw", elem.offsetWidth);
   };
   setWidth(cover);
   window.addEventListener("resize", (e) => {
      setWidth(cover);
   });
}

document.querySelectorAll('[data-page-menu="text"], [data-page-menu="faq"]').forEach((wrapper) => {
   let isFAQ = wrapper.dataset.pageMenu == "faq";
   let menu = wrapper.querySelectorAll('[data-page-menu="menu"]');
   let links = [];
   let activeLinks = new Set();
   var observer = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
         links.forEach((link) => {
            if (link.getAttribute("href") == "#" + entry.target.id) {
               if (entry.isIntersecting) {
                  activeLinks.add(link);
               } else {
                  activeLinks.delete(link);
               }
            }
         });
      });
      let hasActive = false;
      activeLinks.size &&
         links.forEach((link) => {
            link.classList.toggle("active", !hasActive && activeLinks.has(link));
            if (activeLinks.has(link)) {
               hasActive = true;
            }
         });
   });
   let headers = [...wrapper.querySelectorAll("h2,h3")]
      .map((title, i) => {
         let content = title.textContent;
         observer.observe(title);
         // Remove number from heading
         if (/^\d./.test(content)) {
            content = content.split(/^\d./).filter(Boolean).join("").trim();
         }
         if (title.tagName == "H2" && isFAQ) {
            return `<li><span>${content}</span></li>`;
         } else {
            title.id = title.id || "heading-" + (i + 1);
            return `<li><a href="#${title.id}">${content}</a></li>`;
         }
      })
      .join("");
   if (headers) {
      menu.forEach((menu) => {
         menu.innerHTML = `<ol>${headers}</ol>`;
         links.push(...menu.querySelectorAll("a"));
      });
   }
});
