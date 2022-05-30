import isObject from "./helpers/isObject.js";
import upperFirst from "./helpers/upperFirst.js";
import camelToKebab from "./helpers/camelToKebab.js";
import cloneDeep from "./helpers/cloneDeep.js";
import createElementFromString from "./helpers/createElementFromString.js";
// import toggleClasses from "./helpers/toggleClasses.js";
import toMs from "./helpers/toMs.js";
import attr from "./helpers/attr.js";
import { getElement, getElements, toggleClasses } from "./helpers/dom.js";
import Base from "./helpers/Base.js";
import focusableElements from "./helpers/focusableElements.js";

let togglers = {};
let togglesGroups = {};
let closeOnEscapeElems = [];

class Dropdown extends Base {
   static defaultSettings = {
      closeOnEscape: false,
      setFocus: false,
      showOnHover: false,
      hoverContainer: false,
      setHash: false,
      setHeight: true,
      toggleDisplay: false,
      closeOnClick: false,
      scrollToStartOnClose: false,
      scrollYOffset: 0,
      globalClassTarget: "body",
      activeClass: "active",
      hoverDelay: 200,
      matchMedia: "",
      events: {},
      //focusElems: 'button,a,input,textarea',
      // onOpen: function () {},
      // onClose: function () {},
   };
   static instances = new Map();
   get baseNode() {
      return this.dropdown;
   }
   constructor(target, opts = {}) {
      super({ opts, elem: target });
      if (!target) return;
      this.dropdown = target;

      this.togglers = opts.togglers || getElements('[data-toggle="' + this.id + '"]:not(.toggle-init)');

      this.actionArea = opts.actionArea;
      if (!this.actionArea) {
         if (this.dropdown.hasAttribute("data-action-area") || this.dropdown.querySelector(`[data-action-area=""], [data-action-area="${this.id}"]`)) {
            this.actionArea = "[data-action-area]";
         } else {
            this.actionArea = ":root";
         }
      }

      this.globalClassTargetElem = getElement(this.opts.globalClassTarget);

      // Показывать при ховере и если да, определяем контейнер при выходее за который элемент пропадает
      if (this.opts.showOnHover) {
         this.opts.hoverContainer = this.opts.hoverContainer ? getElement(this.opts.hoverContainer) : this.dropdown.parentNode;
      }

      if (!this.opts.matchMedia) {
         this.init();
      } else {
         let mqChange = (mq) => (mq.matches ? this.init() : this.destroy());
         let mq = window.matchMedia(this.opts.matchMedia);
         mq.addEventListener("change", mqChange);
         mqChange(mq);
      }
   }
   init() {
      // Задаем переключатели
      this._setDropdowns();

      if (this.togglers.length) {
         this.dropdown.setAttribute("aria-labelledby", this.togglers[0].id);
      }

      // Устанавливаем нужные классы и aria-аттрибуты
      this.dropdown.classList.contains(this.opts.activeClass) ? this.open() : this.close();

      // обрабатываем клик с клавы
      document.addEventListener("keydown", (e) => {
         if (e.keyCode === 9) this.maintainFocus(e);
      });

      this._events = {};

      // Заносим в общий список элементов
      togglers[this.id] = this;
      // Записываем что он активен, чтобы не инициировать повторно
      this.dropdown.classList.add("toggle-init");
      this.init = true;
   }

   _scrollToStart() {
      if (!this.opts.scrollToStartOnClose) return;
      const y = this.dropdown.getBoundingClientRect().top + window.pageYOffset - this.opts.scrollYOffset;
      window.scrollTo({ top: y, behavior: "smooth" });
   }
   _setDropdowns() {
      this.togglers.forEach((toggler) => {
         toggler.id = toggler.id || "toggler-" + Math.random().toString(36).substring(2, 9);

         // если инициирован - пропускаем
         if (toggler.classList.contains("toggle-init")) return;

         toggler.setAttribute("aria-controls", this.id);

         toggler.addEventListener("click", (e) => {
            e.preventDefault();
            this.dropdown.classList.contains(this.opts.activeClass) ? this.close(e) : this.open(e);
         });

         if (this.opts.showOnHover) {
            let timeout;
            let leaveTimeout;
            toggler.addEventListener("mouseenter", (e) => {
               if (this.isOpen) return;

               clearTimeout(timeout);

               // если после 200мс элемент все еще под курсором - показываем
               timeout = setTimeout(() => {
                  if (!toggler.matches(":hover")) return;

                  this.opts.hoverContainer.classList.add("container-has-hover");

                  this.opts.hoverContainer.addEventListener("mouseleave", (e) => {
                     clearTimeout(leaveTimeout);

                     leaveTimeout = setTimeout(() => {
                        if (this.opts.hoverContainer.matches(":hover")) return;

                        this.close(e);
                        this.opts.hoverContainer.classList.remove("container-has-hover");
                     }, this.opts.hoverDelay);
                  });
                  this.open(e);
               }, this.opts.hoverDelay);
            });
         }
         toggler.classList.add("toggle-init");
      });
   }
   _toggleAttributes(s) {
      let target = this.dropdown;

      target.classList.toggle(this.opts.activeClass, s);
      this.opts.toggleDisplay && target.setAttribute("aria-hidden", !s);
      !this.opts.toggleDisplay && target.setAttribute("aria-expanded", s);

      this.togglers.forEach((elem) => {
         elem.classList.toggle(this.opts.activeClass, s);
         if (elem.nodeName !== "BUTTON") {
            elem.setAttribute("role", "button");
         }
         //elem.attr('aria-expanded', s)
      });

      this.globalClassTargetElem.classList.toggle(this.id + "-active", s);

      if (!s) {
         target.classList.remove("animation-from-next", "animation-from-prev", "is-prev-elem");
         if (this.opts.hoverContainer) {
            this.opts.hoverContainer.classList.remove("container-has-hover");
         }
      }
   }
   _setHeight() {
      this.dropdown.style.height = "auto";
      let height = this.dropdown.scrollHeight;
      this.dropdown.style.height = "";
      this.dropdown.style.setProperty("--height", height + "px");

      if (this.opts.hoverContainer) {
         this.opts.hoverContainer.style.setProperty("--dropdown-height", height + "px");
      }
   }
   getFocusableNodes() {
      return getElements(focusableElements, this.dropdown);
   }

   setFocusToFirstNode() {
      //if (this.config.disableFocus) return;
      // const focusableNodes = this.getFocusableNodes();
      // if (focusableNodes.length) focusableNodes[0].focus();
   }

   maintainFocus(event) {
      // const focusableNodes = this.getFocusableNodes(); // if disableFocus is true
      // if (!this.dropdown.contains(document.activeElement)) {
      //   focusableNodes[0].focus();
      // } else {
      //   const focusedItemIndex = focusableNodes.indexOf(document.activeElement);
      //   if (event.shiftKey && focusedItemIndex === 0) {
      //     focusableNodes[focusableNodes.length - 1].focus();
      //     event.preventDefault();
      //   }
      //   if (!event.shiftKey && focusedItemIndex === focusableNodes.length - 1) {
      //     focusableNodes[0].focus();
      //     event.preventDefault();
      //   }
      // }
   }

   _toggleHash(s) {
      if (!this.opts.setHash) return;

      if (s) {
         return history.pushState({}, "", "#" + this.dropdown.id);
      }

      if (window.location.hash == "#" + this.dropdown.id) {
         return history.replaceState({}, "", window.location.href.split("#")[0]);
      }
   }

   open(e) {
      if (!this.init) return;

      //console.log('open')

      this.activeElement = document.activeElement;

      if (this.opts.closeOnEscape) closeOnEscapeElems.push(this);

      this.opts.toggleDisplay && (this.dropdown.style.display = "block");
      // Делаем принудительную перерисовку после изменения hidden, иначе не будет анимации
      // this.dropdown.removeEventListener("transitionend", this.transitionend, false);

      if (this.opts.setHeight) this._setHeight();

      // setTimeout для принудительной перерисовки
      setTimeout(() => {
         this._toggleAttributes(true);
         //this._toggleFocus(true)
         this._toggleHash(true);

         // Делегируем клик
         this.bodyClickHandler = (e) => {
            if (this.opts.closeOnClick) return this.close();

            if (!e.target.closest(`[data-toggle="${this.id}"], ${this.actionArea}`) || e.target.closest(`#${this.id} [data-close]`)) {
               this.close();
            }
         };
         document.body.addEventListener("click", this.bodyClickHandler);

         this.isOpen = true;
         this._emit("open");

         this.setFocusToFirstNode();
      }, 0);
   }

   close() {
      if (!this.init) return;

      //console.log('close', this)

      // Проверяем, имеет ли элемент transition
      const animations = this.dropdown.getAnimations();
      Promise.allSettled(animations.map(({ finished }) => finished)).then((_) => {
         this.opts.toggleDisplay && (this.dropdown.style.display = "none");
         this._scrollToStart();
         this._emit("close");
      });

      this._toggleAttributes(false);
      this._toggleHash(false);

      document.body.removeEventListener("click", this.bodyClickHandler);

      //this.activeElement && this.activeElement.focus()
      this.isOpen = false;
   }

   static get(id) {
      return togglers[id];
   }
   static close(id) {
      togglers[id] && togglers[id].close();
   }
   static open(id) {
      togglers[id] && togglers[id].open();
   }
   static getGroup(id) {
      return togglesGroups[id];
   }
   static initAll() {
      getElements("[data-dropdown]").forEach((target) => new Dropdown(target));
   }

   destroy() {
      this.dropdown.removeAttribute("aria-hidden");
      this.dropdown.removeAttribute("aria-expanded");
      this.opts.toggleDisplay && (this.dropdown.style.display = "");
      this.togglers.forEach((toggler) => {
         toggler.classList.remove(this.opts.activeClass, "toggle-init");
         toggler.removeAttribute("aria-controls");
         toggler.removeAttribute("aria-expanded");
      });
      this.dropdown.classList.remove(this.opts.activeClass, "toggle-init", "animation-from-next", "animation-from-prev", "is-prev-elem");
      if (this.opts.hoverContainer) {
         this.opts.hoverContainer.classList.remove("container-has-hover");
      }
      this.init = false;
   }
}

document.addEventListener("keyup", (e) => {
   if (e.keyCode == 27 && closeOnEscapeElems.length) {
      closeOnEscapeElems.pop().close();
   }
});

export default Dropdown;
