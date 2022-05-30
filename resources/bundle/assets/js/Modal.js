import isObject from "./helpers/isObject.js";
import upperFirst from "./helpers/upperFirst.js";
import camelToKebab from "./helpers/camelToKebab.js";
import cloneDeep from "./helpers/cloneDeep.js";
import createElementFromString from "./helpers/createElementFromString.js";
import attr from "./helpers/attr.js";
import focusableElements from "./helpers/focusableElements.js";
import { getElement, getElements, toggleClasses } from "./helpers/dom.js";
import Base from "./helpers/Base.js";

import collectAnimations from "./helpers/collectAnimations.js";
import updateStateClasses from "./helpers/updateStateClasses.js";

// portal for nested modals

const MODAL = "modal";
const CONTENT = "content";
const BACKDROP = "backdrop";
const AJAX = "ajax";
const BODY = "body";
const ROOT = "root";
const ROOT_SELECTOR = "body";
const AUTOFOCUS = "autofocus";

const CONFIRM = "confirm";
const CANCEL = "cancel";

const DOM_ELEMENTS = [MODAL, BACKDROP, CONTENT];

const ACTION_TOGGLE = "toggle";
const ACTION_OPEN = "open";
const ACTION_CLOSE = "close";
const ACTION_CLOSE_SELF = "closeSelf";

const EVENT_INIT = "init";
const EVENT_DESTROY = "destroy";
const EVENT_BEFORE_SHOW = "beforeOpen";
const EVENT_OPEN = "open";
const EVENT_OPENED = "opened";
const EVENT_BEFORE_CLOSE = "beforeClose";
const EVENT_CLOSE = "close";
const EVENT_CLOSED = "closed";
const EVENT_CLOSE_PREVENTED = "closePrevented";
const EVENT_CONFIRM = CONFIRM;
const EVENT_CANCEL = CANCEL;
const EVENT_KEY_DOWN = "keydown";
const EVENT_CLICK = "click";
const EVENT_RIGHT_CLICK = "contextmenu";
const EVENT_FOCUS_IN = "focusin";

const ON_MODAL_KEY_DOWN = "_onModalKeyDown";
const ON_MODAL_CLICK = "_onModalClick";
const ON_MODAL_CONFIRM = "_onModalConfirm";
const ON_MODAL_CANCEL = "_onModalCancel";
const ON_BODY_CLICK = "_onBodyClick";
const ON_BODY_FOCUS_IN = "_onBodyFocusIn";

const STATE_OPEN = EVENT_OPEN;
const STATE_OPENED = EVENT_OPENED;
const STATE_CLOSE = EVENT_CLOSE;
const STATE_CLOSED = EVENT_CLOSED;
const STATE_CLOSE_PREVENTED = EVENT_CLOSE_PREVENTED;

const STATE_TRANSITION_FROM = "From";
const STATE_TRANSITION_TO = "To";
const STATE_TRANSITION_EMPTY = "";

const STATE_FULL_OPENED = "fullOpened";

const PREVENT_SCROLL = "preventScroll";

const PRIMARY_STATES = [STATE_OPEN, STATE_OPENED, STATE_CLOSE, STATE_CLOSED];
const SECONDARY_STATES = [STATE_CLOSE_PREVENTED, STATE_FULL_OPENED];
const STATES = [...PRIMARY_STATES, ...SECONDARY_STATES];

const STATE_TRANSITION_ENTER_ACTIVE = "enterActive";
const STATE_TRANSITION_ENTER_FROM = "enterFrom";
const STATE_TRANSITION_ENTER_TO = "enterTo";
const STATE_TRANSITION_LEAVE_ACTIVE = "leaveActive";
const STATE_TRANSITION_LEAVE_FROM = "leaveFrom";
const STATE_TRANSITION_LEAVE_TO = "leaveTo";

const ARIA_LABELLEDBY = "ariaLabelledby";
const ARIA_DESCRIBEDBY = "ariaDescribedby";

const TYPE_CONFIRM = CONFIRM;
const TYPE_BASE = "";

const ON_MODAL_ANIMATION = "_onModalAnimation";
const ON_CONTENT_ANIMATION = "_onContentAnimation";
const ON_BACKDROP_ANIMATION = "_onBackdropAnimation";
const DOM_ANIMATIONS = {
   [MODAL]: ON_MODAL_ANIMATION,
   [CONTENT]: ON_CONTENT_ANIMATION,
   [BACKDROP]: ON_BACKDROP_ANIMATION,
};

const getCustomEventName = (elemName, eventName) => {
   return (eventName += EVENT_SUFFIX[elemName]);
};

const EVENT_SUFFIX = {
   [MODAL]: "",
   [CONTENT]: upperFirst(CONTENT),
   [BACKDROP]: upperFirst(BACKDROP),
   [BODY]: upperFirst(BODY),
};
const ARIA_SUFFIX = {
   [ARIA_LABELLEDBY]: `-title`,
   [ARIA_DESCRIBEDBY]: `-description`,
};

const BACKDROP_HTML = `<div class="modal-backdrop" data-${MODAL}-${BACKDROP}></div>`;
const CONTENT_HTML = `<div class="modal-content" data-${MODAL}-${CONTENT}></div>`;
const MODAL_HTML = `<div class="modal" data-${MODAL}>${BACKDROP_HTML + CONTENT_HTML}</div>`;

const body = document.body;

// ==========
// Helpers
// ==========

// updateBodyScrollbarWidth();

const updateBodyScrollbarWidth = (bodyScrollbarWidthVar = this.defaultSettings.bodyScrollbarWidthVar) => {
   return getElement(":root").style.setProperty(bodyScrollbarWidthVar, window.innerWidth - body.offsetWidth + "px");
};

class Modal extends Base {
   static defaultSettings = {
      closeOnEscape: true,
      escapeStopPropagation: true,
      clickStopPropagation: false,
      closeOnOverlayClick: true,
      returnFocusElem: null,
      returnFocusAfterHide: true,
      setFocusAfterShow: true,
      resetScrollAfterHide: true,
      useFocusTrapping: true,
      useHiddenAttribute: true,
      bodyScrollbarWidthVar: "--body-scrollbar-width",
      updateBodyScrollbarWidthOnOpen: true,
      // awaitPreviousModal: true,
      closeable: true,
      openable: true,
      createOnOpen: false,
      removeOnClosed: false,
      destroyOnClosed: false,
      appendTarget: "body",
      portal: "body",
      autofocus: true,
      autofocusPreventScroll: true,
      autoOpen: true,
      preventScroll: true,
      preventScrollBeforeOpen: true,
      [ARIA_LABELLEDBY]: null,
      [ARIA_DESCRIBEDBY]: null,
      group: "",
      groupClosePrevious: true,
      backdropOutside: false,
      ariaLabelledby: false,
      ariaDescribedby: false,
      ariaRole: "dialog",
      type: TYPE_BASE,
      lazyInit: false,
      awaitingEvents: [],
      hasAjax: false,
      clearAjax: true,
      initialId: null,
      events: {},
      on: {},
      closeOnCancel: true,
      closeOnConfirm: false,
      initOpened: false,
      focusableElements,
      transitionName: "",
      render: {
         [MODAL]: MODAL_HTML,
         [BACKDROP]: BACKDROP_HTML,
      },
      selectors: {
         [MODAL]: `[data-${MODAL}]`,
         [CONTENT]: `[data-${MODAL}-${CONTENT}]`,
         [BACKDROP]: `[data-${MODAL}-${BACKDROP}]`,
         [AJAX]: `[data-${MODAL}-${AJAX}]`,
         [ACTION_TOGGLE]: `[data-${ACTION_TOGGLE}-${MODAL}="{id}"],[href="#{id}"]`,
         [ACTION_OPEN]: `[data-${ACTION_OPEN}-${MODAL}="{id}"]`,
         [ACTION_CLOSE]: `[data-${ACTION_CLOSE}-${MODAL}="{id}"]`,
         [ACTION_CLOSE_SELF]: `[data-${ACTION_CLOSE}-${MODAL}="{id}"],[data-${ACTION_CLOSE}-${MODAL}=""]`,
         [EVENT_CANCEL]: `[data-${MODAL}-${EVENT_CANCEL}]`,
         [EVENT_CONFIRM]: `[data-${MODAL}-${EVENT_CONFIRM}]`,
         [ARIA_LABELLEDBY]: `[data-${MODAL}${ARIA_SUFFIX[ARIA_LABELLEDBY]}]`,
         [ARIA_DESCRIBEDBY]: `[data-${MODAL}${ARIA_SUFFIX[ARIA_DESCRIBEDBY]}]`,
         [AUTOFOCUS]: `[data-autofocus],[autofocus]`,
      },
      classes: {
         [ROOT]: {
            [PREVENT_SCROLL]: `modal-prevent-scroll`,
            [STATE_OPEN]: `modal-{id}-open`,
         },
         toggler: {
            active: "modal-toggler-active",
         },
      },
   };
   static instances = new Map();
   get baseNode() {
      return this[MODAL];
   }
   constructor(elem, opts = {}) {
      super({ opts, elem });
      if (!elem) {
         return;
      }
      this.DOM = { [MODAL]: elem };

      this.group = this.opts.group;

      if (!this.opts.lazyInit) {
         this.init();
      }
   }
   init() {
      let initOpened = this.opts.initOpened;

      [CONTENT, BACKDROP, AJAX, CONFIRM, CANCEL].forEach((elemName) => {
         this.DOM[elemName] = this.find(this.getSelector(elemName));
      });

      if (this[AJAX]) {
         this.opts.hasAjax = true;
      }
      this.awaitAjax = !!this.opts.hasAjax;

      this[ROOT] = getElement(ROOT_SELECTOR);

      attr(this[MODAL], {
         "aria-modal": true,
         "aria-hidden": !initOpened,
         role: this.opts.ariaRole,
         tabindex: -1,
      });

      this.states = {};
      this.promises = {};
      DOM_ELEMENTS.forEach((elemName) => {
         this.promises[elemName] = {
            duration: null,
            event: null,
            animation: null,
         };
         this.states[elemName] = {
            states: [STATE_CLOSED],
            animations: [],
         };
      });

      DOM_ELEMENTS.forEach((elemName) => {
         SECONDARY_STATES.forEach((stateName) => {
            let value = this[elemName]?.dataset[stateName];
            if (value) {
               this.opts.classes[elemName][stateName] += " " + value;
            }
         });
         this._setStateClasses(elemName, initOpened ? STATE_OPENED : STATE_CLOSED);
         this._setStateClasses(elemName, STATE_FULL_OPENED, initOpened);
      });

      this.updateAriaTargets();

      this.toggleHidden(CONTENT, !initOpened);
      this.toggleHidden(MODAL, !initOpened);

      [ON_MODAL_KEY_DOWN, ON_MODAL_CLICK, ON_MODAL_CONFIRM, ON_MODAL_CANCEL, ON_BODY_CLICK, ON_BODY_FOCUS_IN].forEach((h) => {
         this[h] = this[h].bind(this);
      });

      this[MODAL].addEventListener(EVENT_KEY_DOWN, this[ON_MODAL_KEY_DOWN]);
      this[MODAL].addEventListener(EVENT_CLICK, this[ON_MODAL_CLICK]);
      this[MODAL].addEventListener(EVENT_RIGHT_CLICK, this[ON_MODAL_CLICK]);
      body.addEventListener(EVENT_CLICK, this[ON_BODY_CLICK]);

      this.instances.set(this.id, this);

      this.isShown = initOpened;
      this.isInit = true;

      Object.entries(this.opts.on).forEach((events) => this.on(...events));

      this._emit(MODAL, EVENT_INIT);

      if (this.opts.autoOpen && window.location.hash.substring(1) == this.id) {
         this[ACTION_OPEN]();
      }

      if (initOpened) {
         this.updateBodyScrollbarWidth();
         this._preventScroll(1);
         this.setFocusToFirstNode();
      }

      if (this.opts.portal) {
         getElement(this.opts.portal).insertAdjacentElement("beforeend", this[MODAL]);
      }

      return this;
   }
   destroy() {
      this[MODAL].removeEventListener(EVENT_KEY_DOWN, this[ON_MODAL_KEY_DOWN]);
      this[MODAL].removeEventListener(EVENT_CLICK, this[ON_MODAL_CLICK]);
      this[MODAL].removeEventListener(EVENT_RIGHT_CLICK, this[ON_MODAL_CLICK]);
      this[MODAL].removeEventListener(EVENT_CONFIRM, this[ON_MODAL_CONFIRM]);
      this[MODAL].removeEventListener(EVENT_CANCEL, this[ON_MODAL_CANCEL]);
      body.removeEventListener(EVENT_FOCUS_IN, this[ON_BODY_FOCUS_IN]);
      body.removeEventListener(EVENT_CLICK, this[ON_BODY_CLICK]);

      this._emit(MODAL, EVENT_DESTROY);

      this.instances.delete(this.id);

      return this;
   }
   get [MODAL]() {
      return this.DOM[MODAL];
   }
   get [CONTENT]() {
      return this.DOM[CONTENT];
   }
   get [BACKDROP]() {
      return this.DOM[BACKDROP];
   }
   get [AJAX]() {
      return this.DOM[AJAX];
   }
   get isAnimating() {
      return DOM_ELEMENTS.some((elemName) => Object.values(this.promises[elemName]).some(Boolean));
   }
   get allowChangeBackdrop() {
      return !this.group || (this.group && this.groupModals.every(({ states, isShown }) => !isShown || !states[BACKDROP].states.includes(STATE_OPENED)));
   }
   get shownPreventScrollModals() {
      return this.shownModals.filter(({ opts }) => opts.preventScroll);
   }
   get groupModals() {
      return [...this.instances.values()].filter(({ group }) => group == this.group);
   }
   get shownModals() {
      return [...this.instances.values()].filter(({ isShown }) => isShown);
   }
   get latestShownModal() {
      return this.shownModals.pop();
   }
   get shownGroupModals() {
      return this.groupModals.filter(({ isShown, group }) => group && isShown);
   }
   get focusableNodes() {
      return this.findAll(this.opts.focusableElements).filter(({ offsetWidth }) => offsetWidth);
   }
   updateAriaTargets() {
      [ARIA_LABELLEDBY, ARIA_DESCRIBEDBY].forEach((name) => {
         let id = this.opts[name];
         if (!id) {
            const elem = this.find(this.getSelector(name));
            if (!elem) return;
            id = elem.id ||= this.id + ARIA_SUFFIX[name];
         }
         attr(this[MODAL], camelToKebab(name), id);
      });
   }
   remove() {
      this[MODAL].remove();
      this.opts.backdropOutside && !this.shownModals.length && this[BACKDROP]?.remove();
      return this;
   }
   append(position = "beforeend", target = this.opts.appendTarget) {
      if (this.inDOM) return;
      getElement(target).insertAdjacentElement(position, this[MODAL]);
      this[BACKDROP] && this[MODAL].before(this[BACKDROP]);
      return this;
   }
   repaintElem(elemName = MODAL) {
      /* eslint-disable */
      this[elemName]?.offsetWidth;
      /* eslint-enable */
      return this;
   }
   createBackdrop() {
      // console.log(this.DOM[BACKDROP], this.group);
      if (this[BACKDROP] && body.contains(this[BACKDROP])) return;
      this[BACKDROP] = createElementFromString(this.opts.render[BACKDROP]);

      (this.groupModals[0] || this)[MODAL].before(this[BACKDROP]);

      this.repaintElem(BACKDROP);
   }

   toggleHidden(elemName, s) {
      let elem = this[elemName];
      if (!elem || (elemName == BACKDROP && !this.allowChangeBackdrop)) return;
      attr(elem, "aria-hidden", !!s);
      this.opts.useHiddenAttribute && (elem.hidden = s);
   }
   replaceTags(selector = "") {
      return selector.replaceAll("{id}", this.id);
   }
   getSelector(name) {
      return this.replaceTags(this.opts.selectors[name]);
   }
   getClasses(elemName, state) {
      return this.replaceTags(state ? this.opts.classes[elemName][state] : this.opts.classes[elemName]);
   }
   returnFocus() {
      if (this.opts.useFocusTrapping) {
         body.removeEventListener(EVENT_FOCUS_IN, this[ON_BODY_FOCUS_IN]);
      }
      try {
         this.returnFocusElem?.focus({ preventScroll: true });
         return;
      } catch (e) {
         // console.warn("You tried to return focus to", this.returnFocusElem, "but it is not in the DOM anymore");
      }
   }
   setFocusToFirstNode(s = this.opts.setFocusAfterShow) {
      if (!s) return;

      if (this.opts.useFocusTrapping) {
         body.addEventListener(EVENT_FOCUS_IN, this[ON_BODY_FOCUS_IN]);
      }
      let elem = this.focusableNodes[0];
      if (this.opts.autofocus) {
         elem = this.find(this.getSelector(AUTOFOCUS)) || elem;
      }
      elem?.focus({ preventScroll: this.opts.autofocusPreventScroll });
   }
   _emit(elemName, eventName) {
      if (elemName == BACKDROP && !this.allowChangeBackdrop) return;
      const name = getCustomEventName(elemName, eventName);
      let promise;
      if (this.opts.awaitingEvents.includes(name)) {
         promise = new Promise((resolve, reject) => {
            this.animationDone = resolve;
            this.animationReject = reject;
         });
      }
      // console.log(elemName, name);
      this.opts.events[name]?.(this);
      this[MODAL].dispatchEvent(new CustomEvent(name, { detail: this }));
      return promise;
   }
   maintainFocus(e) {
      if (!this.opts.useFocusTrapping) return;

      const focusableNodes = this.focusableNodes;

      const first = focusableNodes[0];
      const last = focusableNodes[focusableNodes.length - 1];

      if (!this[MODAL].contains(document.activeElement)) {
         first?.focus();
      } else {
         const active = focusableNodes.find((elem) => elem == document.activeElement);
         if ((e.shiftKey && active == first) || (!e.shiftKey && active == last)) {
            active?.focus();
            e.preventDefault();
         }
      }
   }
   _preventScroll(s) {
      let hasPreventScrollModals = this.shownPreventScrollModals.length;
      if ((s && hasPreventScrollModals) || (!s && !hasPreventScrollModals)) {
         this._toggleClasses(ROOT, PREVENT_SCROLL, s);
      }
   }
   async [ACTION_TOGGLE](s, checkPrevent = true) {
      let { opts, isShown } = this;

      s = !!(s ?? !isShown);

      if (this.isAnimating || s === isShown) return;

      if (this.opts.updateBodyScrollbarWidthOnOpen && s && !this.shownModals.some(({ opts }) => opts.preventScroll)) {
         this.updateBodyScrollbarWidth();
      }

      if (s && opts.hasAjax) {
         this.awaitAjax = true;
      }

      this._emit(MODAL, s ? EVENT_BEFORE_SHOW : EVENT_BEFORE_CLOSE);
      await this._checkElementAnimation(MODAL, s ? EVENT_BEFORE_SHOW : EVENT_BEFORE_CLOSE);

      if (s && !this.opts.openable) return;

      if (s) {
         opts.createOnOpen && this.append();
         if (opts.backdropOutside && this.allowChangeBackdrop) {
            this.createBackdrop();
         } else if (this.shownGroupModals.length) {
            this[BACKDROP] = this.shownGroupModals[0][BACKDROP];
         }
      }

      if (checkPrevent && !s && !this.opts.closeable) {
         await Promise.allSettled(
            DOM_ELEMENTS.map((elemName) => {
               this._toggleClasses(elemName, STATE_CLOSE_PREVENTED, 1);
               this._emit(elemName, EVENT_CLOSE_PREVENTED);
               return this._checkElementAnimation(elemName, EVENT_CLOSE_PREVENTED);
            })
         );
         for (let elemName of DOM_ELEMENTS) {
            this._toggleClasses(elemName, STATE_CLOSE_PREVENTED, 0);
         }
         return this;
      }

      getElements([this.getSelector(ACTION_TOGGLE), this.getSelector(ACTION_OPEN)].join(",")).forEach((elem) => {
         elem.classList.toggle(elem.dataset.modalOpenClass ?? this.opts.classes.toggler.active, s);
      });
      this._toggleClasses(ROOT, STATE_OPEN, s);

      if (s && this.group && opts.groupClosePrevious) {
         this.shownGroupModals.forEach((modal) => modal.close());
      }

      this.isShown = s;

      if (s) {
         this.opts.preventScrollBeforeOpen && this._preventScroll(s);
         this.returnFocusElem = this.opts.returnFocusElem ?? document.activeElement;
         for (let elemName of [MODAL, BACKDROP]) {
            this._setTransitionStateClasses(elemName, STATE_TRANSITION_FROM);
            this.toggleHidden(elemName, 0);
            this.repaintElem(elemName);
            this._setTransitionStateClasses(elemName, STATE_TRANSITION_TO);
            this._setStateClasses(elemName, STATE_OPEN);
            this._emit(elemName, EVENT_OPEN);
            await this._checkElementAnimation(elemName, EVENT_OPEN);

            this[DOM_ANIMATIONS[elemName]](EVENT_OPEN);
         }
         !this.opts.preventScrollBeforeOpen && this._preventScroll(s);
      } else {
         this._toggleContent(false);
      }

      if (opts.type == TYPE_CONFIRM) {
         this[MODAL].addEventListener(EVENT_CONFIRM, this[ON_MODAL_CONFIRM]);
         this[MODAL].addEventListener(EVENT_CANCEL, this[ON_MODAL_CANCEL]);
         return new Promise((resolve, reject) => {
            this._resolve = resolve;
            this._reject = reject;
         });
      }

      // if (this.group && !this.shownGroupModals.length) {
      //    this.groupModals.forEach((modal) => {
      //       modal[BACKDROP + "Shown"] = false;
      //    });
      // }

      return this;
   }
   async [ACTION_OPEN](checkPrevent) {
      return this[ACTION_TOGGLE](1, checkPrevent);
   }
   async [ACTION_CLOSE](checkPrevent) {
      return this[ACTION_TOGGLE](0, checkPrevent);
   }

   async _toggleContent(s) {
      if (this.opts.hasAjax && s && this.awaitAjax) {
         await new Promise((resolve) => {
            this.ajaxDonePromise = resolve;
         });
      }
      this.ajaxDonePromise = null;

      if (!s) {
         DOM_ELEMENTS.forEach((elemName) => {
            this._setStateClasses(elemName, STATE_FULL_OPENED, 0);
         });
      }
      this._setTransitionStateClasses(CONTENT, STATE_TRANSITION_FROM);

      s && this.toggleHidden(CONTENT, 0);

      this.repaintElem(CONTENT);

      this._setTransitionStateClasses(CONTENT, STATE_TRANSITION_TO);
      this._setStateClasses(CONTENT, s ? STATE_OPEN : STATE_CLOSE);
      this._emit(CONTENT, s ? EVENT_OPEN : EVENT_CLOSE);
      await this._checkElementAnimation(CONTENT, s ? EVENT_OPEN : EVENT_CLOSE);

      await this[DOM_ANIMATIONS[CONTENT]](s ? EVENT_OPEN : EVENT_CLOSE);

      if (!s && this.opts.hasAjax && this.opts.clearAjax && this[AJAX]) {
         this[AJAX].innerHTML = "";
      }
   }
   _showContent() {
      this._toggleContent(true);
      if (this.states[CONTENT].states.includes(STATE_OPENED) && !this[CONTENT].contains(document.activeElement)) {
         this.setFocusToFirstNode();
      }
   }
   _setFinishState(elemName, s) {
      return Promise.allSettled(Object.values(this.promises[elemName])).then((_) => {
         this._setStateClasses(elemName, s ? STATE_OPENED : STATE_CLOSED);
         this._emit(elemName, s ? EVENT_OPENED : EVENT_CLOSED);
      });
   }
   [ON_MODAL_ANIMATION]() {
      const s = this.isShown;
      if (!s && this.opts.resetScrollAfterHide) {
         this[MODAL].scrollTop = 0;
         this[CONTENT].scrollTop = 0;
      }
      this._setFinishState(MODAL, s).then((_) => {
         if (!s) {
            this.opts.destroyOnClosed && this.destroy();
            this.opts.removeOnClosed && this.remove();
         }
      });
   }
   [ON_BACKDROP_ANIMATION]() {
      const s = this.isShown;
      this._setFinishState(BACKDROP, s);
      s && this._showContent();
   }
   async [ON_CONTENT_ANIMATION]() {
      const s = this.isShown;

      // s && this.setFocusToFirstNode();

      this._setFinishState(CONTENT, s).then((_) => (s ? this.setFocusToFirstNode() : this._preventScroll(s)));

      if (!s) {
         this.opts.returnFocusAfterHide && this.returnFocus();

         for (let elemName of [BACKDROP, MODAL]) {
            this._setTransitionStateClasses(elemName, STATE_TRANSITION_FROM);
            this.repaintElem(elemName);
            this._setTransitionStateClasses(elemName, STATE_TRANSITION_TO);
            this._setStateClasses(elemName, STATE_CLOSE);
            this._emit(elemName, EVENT_CLOSE);
            await this._checkElementAnimation(elemName, EVENT_CLOSE);

            this[DOM_ANIMATIONS[elemName]](EVENT_CLOSE);
         }
      } else {
         DOM_ELEMENTS.forEach((elemName) => {
            Promise.allSettled(Object.values(this.promises[elemName])).then((_) => {
               this._setStateClasses(elemName, STATE_FULL_OPENED);
            });
         });
      }
   }
   _checkElementAnimation(elemName, eventName) {
      const elem = this[elemName];
      if (!elem) return;
      let promises = this.promises[elemName];

      let { allPromises, primaryPromise } = collectAnimations.bind(this)({ elem, promises, eventName });

      const setEmpty = () => {
         eventName == EVENT_CLOSE && this.toggleHidden(elemName, 1);
         this._setTransitionStateClasses(elemName, STATE_TRANSITION_EMPTY);
         promises.duration = promises.event = promises.animation = null;
      };
      primaryPromise ? Promise.allSettled(Object.values(allPromises)).then(setEmpty) : setEmpty();

      return primaryPromise;
   }
   _updateElemClasses(elemName) {
      let elem = this[elemName];
      let states = this.states[elemName];
      updateStateClasses.bind(this)({ elem, states, STATES, elemName });
   }
   _setTransitionStateClasses(elemName, stateType) {
      if (!this[elemName]) return;
      let names = [];
      if (stateType) {
         if (this.isShown) {
            names = stateType == STATE_TRANSITION_FROM ? [STATE_TRANSITION_ENTER_FROM] : [STATE_TRANSITION_ENTER_ACTIVE, STATE_TRANSITION_ENTER_TO];
         } else {
            names = stateType == STATE_TRANSITION_FROM ? [STATE_TRANSITION_LEAVE_FROM] : [STATE_TRANSITION_LEAVE_ACTIVE, STATE_TRANSITION_LEAVE_TO];
         }
      }
      this.states[elemName].animations = names;
      this._updateElemClasses(elemName);
   }
   _setStateClasses(elemName, state, s = true) {
      if (!this[elemName] || (state !== STATE_OPENED && elemName == BACKDROP && !this.allowChangeBackdrop)) return;

      const updateStates = (modal, s) => {
         let states = modal.states[elemName];
         if (s) {
            states.states = PRIMARY_STATES.includes(state) ? [state] : [...states.states, state];
         } else {
            states.states = states.states.filter((s) => s !== state);
         }
      };
      if (elemName == BACKDROP && this.group) {
         this.groupModals.forEach((modal) => updateStates(modal, s));
      } else {
         updateStates(this, s);
      }

      this._updateElemClasses(elemName);
   }
   _toggleClasses(elemName, state, s) {
      toggleClasses(this[elemName], this.getClasses(elemName, state), s);
   }

   [ON_BODY_CLICK](e) {
      for (let action of [ACTION_TOGGLE, ACTION_OPEN, ACTION_CLOSE]) {
         if (e.target.closest(this.getSelector(action))) {
            e.preventDefault();
            this[action]();
         }
      }
   }
   [ON_BODY_FOCUS_IN]() {
      if (!this[MODAL].contains(document.activeElement) && this.latestShownModal == this) {
         this.focusableNodes[0]?.focus();
      }
   }
   [ON_MODAL_CLICK](e) {
      this.opts.clickStopPropagation && e.stopPropagation();

      if (!this[CONTENT].contains(e.target) && this.opts.closeOnOverlayClick) {
         this[ACTION_CLOSE](true);
      }

      for (let event of [EVENT_CANCEL, EVENT_CONFIRM]) {
         if (e.target.closest(this.getSelector(event))) {
            return this._emit(MODAL, event);
         }
      }
      if (e.target.closest(this.getSelector(ACTION_CLOSE_SELF))) {
         this[ACTION_CLOSE]();
      }
   }
   [ON_MODAL_KEY_DOWN](e) {
      const shownModals = this.shownModals;
      if (e.key === "Escape" && this.opts.closeOnEscape && shownModals[shownModals.length - 1] == this) {
         this.opts.escapeStopPropagation && e.stopPropagation();
         this[ACTION_CLOSE](true);
      }
      if (e.key === "Tab") this.maintainFocus(e);
   }
   [ON_MODAL_CONFIRM]() {
      this._resolve(true);
      // this[ACTION_CLOSE]();
   }
   [ON_MODAL_CANCEL]() {
      this._resolve(false);
      this[ACTION_CLOSE]();
   }
   ajaxDone() {
      this.awaitAjax = false;
      this.ajaxDonePromise?.();
   }
   setContent(html, ajaxDone = true) {
      let ajaxElem = this[AJAX];
      if (ajaxElem) {
         if (typeof html == "String") {
            ajaxElem.innerHTML = html;
         } else {
            ajaxElem.append(html);
         }
         this.updateAriaTargets();
         ajaxDone && this.ajaxDone();
         return ajaxElem.firstChild;
      }
   }

   find(...params) {
      return this.findAll(...params)[0];
   }
   findAll(selector, excludeNestedModals = true) {
      let elems = getElements(selector, this[MODAL]);
      if (excludeNestedModals) {
         let modalsIds = [...this.instances.keys(), this[MODAL].id].map((s) => "#" + s).join(",");
         elems = elems.filter((elem) => elem.closest(modalsIds).id === this.id);
      }
      return elems;
   }
   updateBodyScrollbarWidth() {
      updateBodyScrollbarWidth(this.opts.bodyScrollbarWidthVar);
   }
   static updateBodyScrollbarWidth() {
      updateBodyScrollbarWidth();
   }
   static async [ACTION_OPEN](id) {
      return this.instances.get(id)?.[ACTION_OPEN]();
   }
   static async [ACTION_CLOSE](id) {
      return this.instances.get(id)?.[ACTION_CLOSE]();
   }

   static updateDefaultClasses(obj) {
      for (const elemName of Object.keys(obj)) {
         for (const [state, value] of Object.entries(obj[elemName])) {
            const classes = isObject(value) ? value.classes : value;
            const replace = isObject(value) ? value.replace : false;
            this.defaultSettings.classes[elemName][state] = replace ? classes : defaultSettings.classes[elemName][state] + " " + classes.trim();
         }
      }
      return this.defaultSettings.classes;
   }
   static create(html, opts = {}) {
      opts = cloneDeep({ ...this.defaultSettings, ...opts });
      let modalElem = createElementFromString(html || this.defaultSettings.render[MODAL](opts));
      let modal = new Modal(modalElem, opts);
      if (!modal.opts.createOnOpen) {
         modal.append();
      }
      return modal;
   }
}

// DOM_ELEMENTS.forEach((elemName) => {
//    Modal.defaultSettings.classes[elemName] ||= {};
//    for (let state of STATES) {
//       Modal.defaultSettings.classes[elemName][state] = `${elemName == MODAL ? MODAL : `${MODAL}-${elemName}`}--${camelToKebab(state)}`;
//    }
// });

export default Modal;
