"use strict";

import focus from "./helpers/focus.js";
import createElementFromString from "./helpers/createElementFromString.js";
import attr from "./helpers/attr.js";
import camelToKebab from "./helpers/camelToKebab.js";
import { getElement, getElements, toggleClasses } from "./helpers/dom.js";
import Base from "./helpers/Base.js";

const SELECT_ACTION_CLOSE = 0;
const SELECT_ACTION_CLOSE_SELECT = 1;
const SELECT_ACTION_FIRST = 2;
const SELECT_ACTION_LAST = 3;
const SELECT_ACTION_NEXT = 4;
const SELECT_ACTION_OPEN = 5;
const SELECT_ACTION_PAGE_DOWN = 6;
const SELECT_ACTION_PAGE_UP = 7;
const SELECT_ACTION_PREVIOUS = 8;
const SELECT_ACTION_SELECT = 9;
const SELECT_ACTION_TYPE = 10;
const SELECT_ACTION_RETURN_FROM_BUFFER = 11;
const SELECT_ACTION_PREVIOUS_SELECTED = 12;
const SELECT_ACTION_NEXT_SELECTED = 13;

const BASE = "base";
const WRAPPER = "wrapper";
const DROPDOWN = "dropdown";
const OPTIONS = "options";
const PRIMARY = "primary";
const OPTION = "option";
const OPTION_CREATE = "optionCreate";
const SELECTED_OPTION = "selectedOption";
const NO_OPTIONS = "noOptions";
const CONTROL = "control";
const ARROW = "arrow";
const ACTIONS = "actions";
const CLEAR = "clear";
const OPTGROUP = "optgroup";

const ELEMS_SOLO = [DROPDOWN, OPTION, OPTION_CREATE, SELECTED_OPTION, OPTGROUP];

const ARIA_ACTIVEDESCENDANT = "aria-activedescendant";
const ARIA_SELECTED = "aria-selected";
const ARIA_DISABLED = "aria-disabled";
const ARIA_LABEL = "aria-label";
const ARIA_EXPANDED = "aria-expanded";
const ARIA_LABELLEDBY = "aria-labelledby";

const FOCUSED = "focused";
const DISABLED = "disabled";
const TABINDEX = "tabindex";
const SELECTED = "selected";

const li = (content = "") => `<li>${content}</li>`;
const ul = () => "<ul></ul>";
const div = (content = "") => `<div>${content}</div>`;
const button = (content = "") => `<button type="button">${content}</button>`;

const DISABLED_ATTRS = {
   [DISABLED]: DISABLED,
   [ARIA_DISABLED]: true,
   [TABINDEX]: -1,
};

const ON_WRAPPER_CLICK = "_onWrapperClick";
const ON_WRAPPER_MOUSEDOWN = "_onWrapperMousedown";
const ON_CONTROL_BLUR = "_onControlBlur";
const ON_CONTROL_FOCUS = "_onControlFocus";
const ON_CONTROL_TYPE = "_onControlType";
const ON_CONTROL_KEYDOWN = "_onControlKeydown";

function escape(string) {
   return String(string).replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/&/g, "&amp;");
}

// map a key press to an action
function getActionFromKey(event, menuOpen) {
   const { key, altKey, ctrlKey, metaKey } = event;
   const openKeys = ["ArrowDown", "ArrowUp", "Enter", " "]; // all keys that will do the default open action
   // handle opening when closed
   if (!menuOpen && openKeys.includes(key)) {
      return SELECT_ACTION_OPEN;
   }
   // home and end move the selected option when open or closed
   if (key === "Home") {
      return SELECT_ACTION_FIRST;
   }
   if (key === "End") {
      return SELECT_ACTION_LAST;
   }
   if (key == "z" && metaKey) {
      return SELECT_ACTION_RETURN_FROM_BUFFER;
   }
   if (key == "ArrowLeft") {
      return SELECT_ACTION_PREVIOUS_SELECTED;
   }
   if (key == "ArrowRight") {
      return SELECT_ACTION_NEXT_SELECTED;
   }
   // handle typing characters when open or closed
   if (key === "Backspace" || key === "Clear" || (key.length === 1 && key !== " " && !altKey && !ctrlKey && !metaKey)) {
      return SELECT_ACTION_TYPE;
   }
   // handle keys when open
   if (menuOpen) {
      if (key === "ArrowUp" && altKey) {
         return SELECT_ACTION_CLOSE_SELECT;
      } else if (key === "ArrowDown" && !altKey) {
         return SELECT_ACTION_NEXT;
      } else if (key === "ArrowUp") {
         return SELECT_ACTION_PREVIOUS;
      } else if (key === "PageUp") {
         return SELECT_ACTION_PAGE_UP;
      } else if (key === "PageDown") {
         return SELECT_ACTION_PAGE_DOWN;
      } else if (key === "Escape") {
         return SELECT_ACTION_CLOSE;
      } else if (key === "Enter" || key === " ") {
         return SELECT_ACTION_CLOSE_SELECT;
      }
   }
}

// check if an element is currently scrollable
function isScrollable(element) {
   return element && element.clientHeight < element.scrollHeight;
}

// ensure a given child element is within the parent's visible scroll area
// if the child is not visible, scroll the parent
function maintainScrollVisibility(activeElement, scrollParent) {
   const { offsetHeight, offsetTop } = activeElement;
   const { offsetHeight: parentOffsetHeight, scrollTop } = scrollParent;

   const isAbove = offsetTop < scrollTop;
   const isBelow = offsetTop + offsetHeight > scrollTop + parentOffsetHeight;

   if (isAbove) {
      scrollParent.scrollTo(0, offsetTop);
   } else if (isBelow) {
      scrollParent.scrollTo(0, offsetTop - parentOffsetHeight + offsetHeight);
   }
}

class Select extends Base {
   static instances = new Map();
   static defaultSettings = {
      baseClass: "select",
      searchable: false,
      noOptions: "Sorry, no matching options.",
      closeAfterSelect: true,
      // create: true,
      multiply: false,
      maxItems: -1,
      placeholder: "Select option",
      allowEmptyOption: true,
      toggleSelectedOption: false,
      hideSelected: true,
      hideDisabled: true,
      optionsFromSelect: true,
      options: null,
      events: {},
      clearable: true,
      disabled: false,
      locked: false,
      caretPosition: true,
      restoreOnBackspace: false,
      openOnFocus: true,
      dataAttr: "data",
      classes: {
         optgroupTitle: "select-optgroup__title",
         optgroupList: "select-optgroup__list",
      },
      selectors: {
         select: `[data-select]`,
      },
      render: {
         option(option, { escape }) {
            return li(escape(option.label));
         },
         optionCreate({ message = "Add", searchString }, { escape }) {
            return li(`${message} <strong>${searchString}</strong>...`);
         },
         optgroup(optgroup, { select, escape }) {
            return `
               <div>
                  <div class="${select.opts.classes.optgroupTitle}">${escape(optgroup.label)}</div>
                  <div class="${select.opts.classes.optgroupList}" data-optgroup-list></div>
               </div>`;
         },
         selectedOption(option, { escape }) {
            return button(escape(option.label));
         },
         arrow: () => div(),
         clear: () => button(),
         actions: () => div(),
         dropdown: () => div(),
         options: () => ul(),
         primary: () => div(),
         wrapper: () => div(),
         noOptions(message, { escape }) {
            return div(escape(message));
         },
      },
   };
   get baseNode() {
      return this.DOM[BASE];
   }
   get baseNodeEvent() {
      return this.DOM[WRAPPER];
   }
   constructor(base, opts = {}) {
      super({ instanceName: Select.name, opts, elem: base });
      if (!base) {
         return;
      }
      if (this.instances.has(base.id)) {
         return this.instances.get(base.id);
      }
      const DOM = { [BASE]: base };

      let id = this.id;
      opts = this.opts;
      // opts = cloneDeep({ ...Select.defaultSettings, ...JSON.parse(base.dataset.select || "{}"), ...opts });
      // const id = (base.id ||= "dropdown-" + Math.random().toString(36).substring(2, 9));

      Object.assign(this, {
         DOM,
         opts,
         id,
         activeIndex: 0,
         open: false,
         _searchString: "",
         buffer: [],
         disabled: opts.disabled,
         labelId: "",
         selected: new Map(),
         options: opts.options,
      });
      [ON_WRAPPER_CLICK, ON_WRAPPER_MOUSEDOWN, ON_CONTROL_BLUR, ON_CONTROL_FOCUS, ON_CONTROL_TYPE, ON_CONTROL_KEYDOWN, CLEAR].forEach((name) => {
         this[name] = this[name].bind(this);
      });

      attr(DOM[BASE], TABINDEX, -1);

      this.createWrapper();

      if (opts.optionsFromSelect) {
         this.options = this.createOptionsFromSelect(DOM[BASE]);
      }

      this.options = this.options.filter(({ value, label }) => {
         if (!value) {
            opts.placeholder ||= label;
            return opts.allowEmptyOption;
         }
         return true;
      });

      // create options
      this.selected.size && [...this.selected.keys()].forEach((option) => this.addSelected(option));

      // this.onControlClick = this.onControlClick.bind(this);

      // this[ARROW].addEventListener("click", this.onControlClick);
      // add event listeners
      // this[WRAPPER].addEventListener("click", this.onWrapperClick);

      DOM[WRAPPER].addEventListener("click", this[ON_WRAPPER_CLICK]);
      DOM[WRAPPER].addEventListener("mousedown", this[ON_WRAPPER_MOUSEDOWN]);
      DOM[CONTROL].addEventListener("blur", this[ON_CONTROL_BLUR]);
      DOM[CONTROL].addEventListener("focus", this[ON_CONTROL_FOCUS]);
      DOM[CONTROL].addEventListener("keydown", this[ON_CONTROL_KEYDOWN]);

      opts.clearable && DOM[CLEAR].addEventListener("click", this[CLEAR]);
      opts.searchable && DOM[CONTROL].addEventListener("input", this[ON_CONTROL_TYPE]);

      DOM[BASE].addEventListener("change", (e) => {
         this.value = opts.multiply ? [...DOM[BASE].selectedOptions].map(({ value }) => value) : DOM[BASE].value;
      });

      DOM[WRAPPER].addEventListener("change", (e) => {
         if (opts.multiply) {
            [...DOM[BASE].options].forEach((option) => {
               option.selected = this.value.includes(option.value);
            });
         } else {
            DOM[BASE].value = this.value;
            // DOM[BASE].dispatchEvent(new Event("change"));
         }
      });

      this.renderOptions();

      this.setState(BASE);

      DOM[WRAPPER].appendChild(DOM[BASE]);

      this.instances.set(id, this);

      this.isInit = true;
   }
   readData(elem, target = {}) {
      let dataAttr = this.opts.dataAttr;
      let data = Object.assign(target, elem.dataset);
      if (dataAttr) {
         data = Object.assign(data, JSON.parse(data[dataAttr] || "{}"));
         if (data[dataAttr] === elem.dataset[dataAttr]) {
            delete data[dataAttr];
         }
      }
      return data;
   }
   renderNode(name, attrs = {}, opts) {
      let elem;
      attrs.class ??= [];
      if (name == CONTROL) {
         let id = this.labelId + this.id;
         let type = this.opts.searchable ? "text" : "button";
         elem = document.createElement(type == "text" ? "input" : type);
         attrs = {
            size: 1,
            type,
            class: [this.getStateClass(CONTROL, type)],
            "aria-haspopup": "listbox",
            role: "combobox",
            [ARIA_EXPANDED]: false,
            autocomplete: "off",
            autocapitalize: "off",
            spellcheck: "off",
            id,
            [ARIA_LABELLEDBY]: (this.labelId + id).trim(),
            ...(this.disabled ? DISABLED_ATTRS : {}),
         };
      } else {
         elem = createElementFromString(this.opts.render[name](...[opts, { select: this, escape }].filter(Boolean)));
      }
      for (let [key, value] of Object.entries(attrs)) {
         elem.setAttribute(key, key == "class" ? [this.getStateClass(name), ...value].filter(Boolean).join(" ") : value);
      }
      return elem;
   }
   createWrapper() {
      const DOM = this.DOM;
      DOM[WRAPPER] = this.renderNode(WRAPPER, {
         class: [DOM[BASE].dataset.selectClasses, ...["caretPosition", "searchable", "disabled", "locked", "multiply"].map((n) => this.getStateClass(WRAPPER, n, this.opts[n]))],
         id: this.id,
      });
      DOM[BASE].after(DOM[WRAPPER]);

      DOM[WRAPPER].appendChild((DOM[PRIMARY] = this.renderNode(PRIMARY)));
      DOM[PRIMARY].appendChild((DOM[CONTROL] = this.renderNode(CONTROL)));
      DOM[WRAPPER].appendChild((DOM[ACTIONS] = this.renderNode(ACTIONS)));
      DOM[ACTIONS].appendChild((DOM[ARROW] = this.renderNode(ARROW)));
      DOM[WRAPPER].appendChild((DOM[DROPDOWN] = this.renderNode(DROPDOWN)));

      DOM[OPTIONS] = this.renderNode(OPTIONS, {
         tabindex: -1,
         role: "listbox",
         [ARIA_LABELLEDBY]: this.labelId,
         id: this.id + "-list",
      });
      DOM[DROPDOWN].appendChild(DOM[OPTIONS]);

      if (this.opts.clearable) {
         DOM[CLEAR] = this.renderNode(CLEAR, {
            [ARIA_LABEL]: "Очистить",
            ...(this.disabled ? DISABLED_ATTRS : {}),
         });
         DOM[ACTIONS].appendChild(DOM[CLEAR]);
      }
   }
   get value() {
      let values = [...this.selected.keys()].map((o) => o.value);
      return this.opts.multiply ? values : values[0];
   }
   set value(newValue) {
      this.selected.forEach((elem) => elem.remove());
      this.selected.clear();
      const values = Array.isArray(newValue) ? newValue : [newValue];
      values.forEach((val) => {
         this.addSelected(this.options.find(({ value }) => value == val));
      });
   }
   // get an updated option index after performing an action
   getUpdatedIndex(currentIndex, maxIndex, action) {
      const pageSize = 10; // used for pageup/pagedown
      let newIndex;
      switch (action) {
         case SELECT_ACTION_FIRST:
            newIndex = 0;
            break;
         case SELECT_ACTION_LAST:
            newIndex = maxIndex;
            break;
         case SELECT_ACTION_PREVIOUS:
            newIndex = Math.max(0, currentIndex - 1);
            break;
         case SELECT_ACTION_NEXT:
            newIndex = Math.min(maxIndex, currentIndex + 1);
            break;
         case SELECT_ACTION_PAGE_UP:
            newIndex = Math.max(0, currentIndex - pageSize);
            break;
         case SELECT_ACTION_PAGE_DOWN:
            newIndex = Math.min(maxIndex, currentIndex + pageSize);
            break;
         default:
            newIndex = currentIndex;
      }

      if (this.isOptionDisabled(this.availableOptions[newIndex])) {
         return this.getUpdatedIndex(newIndex, maxIndex, action);
      } else {
         return newIndex;
      }
   }
   clearAll() {}
   addSelected(option) {
      // if (option?._new) {
      //    delete option._new;
      //    this.options.push(option);
      //    // return;
      // }
      if (!option || !option.value || this.isOptionSelected(option) || this.isOptionDisabled(option) || (this.opts.maxItems != -1 && this.selected.size >= this.opts.maxItems)) return;
      if (!this.opts.multiply && this.selected.size) {
         this.clear();
      }
      this.selected.set(option, this.createSelectedOption(option));
      this.updatePlaceholder();
      if (this.isInit) {
         this._emit("change");
      }
   }

   getOptionIdByIndex(index) {
      return this.id + "-" + OPTION + "-" + index;
   }

   createOptionsFromSelect(select) {
      this.optgroups = getElements(OPTGROUP, select).map((elem) => this.readData(elem, { label: elem.label, disabled: elem.disabled }));
      return [...select.options].map((elem) => {
         let option = this.readData(elem, {
            value: elem.value,
            disabled: elem.disabled,
            label: elem.label || elem.textContent,
            optgroup: elem.parentNode.tagName == "OPTGROUP" ? elem.parentNode.label : "",
         });
         elem.selected && this.addSelected(option);
         return option;
      });
   }
   createOption(option, index) {
      let focused = this.activeIndex == index;
      let id = this.getOptionIdByIndex(index);
      let role = OPTION;
      let optionEl;
      if (option._new) {
         optionEl = this.renderNode(
            OPTION_CREATE,
            {
               id,
               role,
               class: [this.getStateClass(OPTION_CREATE, FOCUSED, focused)],
            },
            { searchString: this.searchString }
         );
      } else {
         let disabled = this.isOptionDisabled(option);
         let selected = this.isOptionSelected(option);
         optionEl = this.renderNode(
            OPTION,
            {
               id,
               role,
               class: [this.getStateClass(OPTION, DISABLED, disabled), this.getStateClass(OPTION, FOCUSED, focused), this.getStateClass(OPTION, SELECTED, selected)],
               [ARIA_SELECTED]: selected,
               [ARIA_DISABLED]: disabled,
            },
            option
         );
      }
      optionEl.addEventListener("click", (event) => {
         event.stopPropagation();
         this.onOptionClick(option);
      });
      optionEl.addEventListener("mousedown", this.onOptionMouseDown.bind(this));
      return optionEl;
   }
   clear() {
      this.selected.forEach((elem) => elem.remove());
      this.selected.clear();
      this._emit("change");
      this.renderOptions();
      this.DOM[CONTROL].focus();
      // this.updatePlaceholder();
   }
   removeSelectedOption(option, setFocus = false) {
      this.selected.get(option).remove();
      this.selected.delete(option);
      this._emit("change");
      this.renderOptions();
      if (setFocus && !focus(this.DOM[PRIMARY].firstElementChild)) {
         this.DOM[CONTROL].focus();
      }
   }

   createSelectedOption(option, index) {
      let optionEl = this.renderNode(
         SELECTED_OPTION,
         {
            class: [this.getStateClass(SELECTED_OPTION, this.opts.multiply ? "multiply" : "single")],
            tabindex: -1,
            [ARIA_LABEL]: `Remove ${option.label}`,
            ...(this.disabled ? DISABLED_ATTRS : {}),
         },
         option
      );

      optionEl.addEventListener("click", (event) => {
         this.removeSelectedOption(option);
      });
      this.DOM[CONTROL].before(optionEl);

      return optionEl;
   }
   [ON_CONTROL_FOCUS](e) {
      // this.updateMenuState(true);
      // console.log(e);
      this.setState(WRAPPER, "focus");
      if (this.opts.searchable || (this.DOM[CONTROL].matches(":focus-visible") && !this.wrapperMouseDown)) {
         this.setState(WRAPPER, "focusVisible");
      }

      if (this.opts.openOnFocus && !this.ignoreBlur && !this.wrapperMouseDown) {
         // console.log("focus", this.open, true);
         this.updateMenuState(true);
      }
   }
   [ON_CONTROL_BLUR](e) {
      // do not do blur action if ignoreBlur flag has been set
      // console.log("blur", this.ignoreBlur);
      if (this.ignoreBlur) {
         this.ignoreBlur = false;
         if (this.wrapperMouseDown || this.wrapperMouseDown === undefined) {
            return;
         }
      }
      this.setState(WRAPPER, "focus", false);
      this.setState(WRAPPER, "focusVisible", false);
      if (this.open) {
         // !this.opts.multiply && this.selectOption(this.activeIndex);
         this.updateMenuState(false);
         this.ignoreBlur = false;
      }
      this.DOM[PRIMARY].appendChild(this.DOM[CONTROL]);
      this.updatePlaceholder();
      // select current option and close
   }
   // onControlClick(e) {
   //    // e.stopPropagation();
   //    // this.updateMenuState(!this.open);
   //    // this.ignoreBlur = true;
   //    // focus(this[SEARCH]);
   // }
   [ON_WRAPPER_MOUSEDOWN](e) {
      // console.log("mousedown", this.open, !this.open);
      this.wrapperMouseDown = true;
      document.body.addEventListener(
         "click",
         (e) => {
            this.wrapperMouseDown = false;
         },
         { once: true }
      );
   }
   [ON_WRAPPER_CLICK](e) {
      // if (e.target == this[CONTROL]) return;
      this.ignoreBlur = true;
      // this.ignoreFocusOpen = true;
      // console.log("click", this.open, !this.open);
      this.updateMenuState(!this.open);
      this.DOM[CONTROL].focus();
      // this.ignoreFocusOpen = false;
   }

   returnFromBuffer() {
      if (this.buffer.length) {
         let option = this.buffer.pop();
         this.addSelected(option);
         this.renderOptions();
      }
   }
   [ON_CONTROL_KEYDOWN](event) {
      const { key } = event;

      // console.log(key);

      const action = getActionFromKey(event, this.open);

      if (key === "Backspace" || key === "Clear") {
         if (this.opts.multiply && this.opts.searchable && this.selected.size && !this.DOM[CONTROL].value) {
            if (!this.DOM[CONTROL].previousElementSibling) return;
            console.log(this.DOM[CONTROL].value);
            let last = [...this.selected].find(([option, optionSelected]) => optionSelected == this.DOM[CONTROL].previousElementSibling);
            this.buffer.push(last[0]);
            this.selected.delete(last[0]);
            last[1].remove();
            this.updatePlaceholder();
            this.renderOptions();
            this._emit("change");
            if (this.opts.restoreOnBackspace && this.opts.searchable && (key === "Backspace" || key === "Clear")) {
               this.DOM[CONTROL].value = last[0].label + " ";
            }
         }
      }

      switch (action) {
         case SELECT_ACTION_PREVIOUS_SELECTED:
         case SELECT_ACTION_NEXT_SELECTED:
            if (this.opts.searchable) {
               if (action == SELECT_ACTION_PREVIOUS_SELECTED) {
                  this.DOM[CONTROL].previousElementSibling?.before(this.DOM[CONTROL]);
               } else {
                  this.DOM[CONTROL].nextElementSibling?.after(this.DOM[CONTROL]);
               }
               this.DOM[CONTROL].focus();
               this.updatePlaceholder();
            }
            break;
         case SELECT_ACTION_RETURN_FROM_BUFFER:
            this.returnFromBuffer();
         case SELECT_ACTION_LAST:
         case SELECT_ACTION_FIRST:
            this.updateMenuState(true);
         // intentional fallthrough
         case SELECT_ACTION_NEXT:
         case SELECT_ACTION_PREVIOUS:
         case SELECT_ACTION_PAGE_UP:
         case SELECT_ACTION_PAGE_DOWN:
            event.preventDefault();
            return this.onOptionChange(this.getUpdatedIndex(this.activeIndex, this.availableOptions.length - 1, action));
         case SELECT_ACTION_CLOSE_SELECT:
            event.preventDefault();
            let option = this.availableOptions[this.activeIndex];
            if (this.opts.toggleSelectedOption && this.isOptionSelected(option)) {
               this.removeSelectedOption(option);
            } else {
               this.selectOption(this.activeIndex);
            }
         // intentional fallthrough
         case SELECT_ACTION_CLOSE:
            if (this.opts.closeAfterSelect) {
               return this.updateMenuState(false);
            }
            return;
         case SELECT_ACTION_TYPE:
            // return this.onControlType(key);
            return;
         case SELECT_ACTION_OPEN:
            event.preventDefault();
            this.DOM[CONTROL].focus();
            return this.updateMenuState(true, !this.opts.searchable);
      }
   }
   get searchString() {
      return this._searchString;
   }
   set searchString(value) {
      this.setState(WRAPPER, "hasSearchString", value);
      this._searchString = value;
   }
   [ON_CONTROL_TYPE]({ key }) {
      // open the listbox if it is closed

      this.updateMenuState(true);
      this.searchString = this.DOM[CONTROL].value;
      this.DOM[CONTROL].setAttribute("size", this.DOM[CONTROL].value.length);
      this.renderOptions();
   }
   updateFocused() {
      const options = getElements("[role=option]", this.DOM[OPTIONS]);
      options.forEach((optionEl, i) => toggleClasses(optionEl, this.getStateClass(OPTION, "focused"), i == this.activeIndex));
      // ensure the new option is in view
      if (isScrollable(this.DOM[DROPDOWN])) {
         maintainScrollVisibility(options[this.activeIndex], this.DOM[DROPDOWN]);
      }
   }
   onOptionChange(index) {
      this.activeIndex = index;
      attr(this.DOM[CONTROL], ARIA_ACTIVEDESCENDANT, this.getOptionIdByIndex(index), true);
      this.updateFocused();
   }

   onOptionClick(option) {
      if (this.isOptionDisabled(option)) return;
      if (this.toggleSelectedOption && this.isOptionSelected(option)) {
         this.removeSelectedOption(option, true);
      } else {
         let index = this.availableOptions.indexOf(option);
         this.onOptionChange(index);
         this.selectOption(index);
      }
      if (this.opts.closeAfterSelect) {
         this.updateMenuState(false);
      }
      this.DOM[CONTROL].focus();
   }
   onOptionMouseDown() {
      // Clicking an option will cause a blur event,
      // but we don't want to perform the default keyboard blur action
      this.ignoreBlur = true;
   }
   get hasSelected() {
      return this.selected.size;
   }
   getCaretProsition() {
      return [...this.DOM[CONTROL].parentElement.children].indexOf(this.DOM[CONTROL]);
   }
   updatePlaceholder() {
      this.setState(WRAPPER, "hasSelected", this.hasSelected);

      this.DOM[CONTROL][this.opts.searchable ? "placeholder" : "innerHTML"] = !this.opts.multiply || this.getCaretProsition() == this.selected.size ? this.opts.placeholder : "";

      if (this.opts.clearable) {
         this.DOM[CLEAR].hidden = !this.hasSelected;
      }
   }

   get availableOptions() {
      let options = [...this.options];
      // if (this.searchString && this.opts.create && options) {
      //    options.unshift({
      //       value: this.searchString,
      //       label: this.searchString,
      //       _new: true,
      //    });
      //    // let optionCreate = this.renderNode(
      //    //    OPTION_CREATE,
      //    //    {
      //    //       id: this.getOptionIdByIndex("create"),
      //    //       class: [this.getStateClass(OPTION_CREATE, FOCUSED, this.activeIndex == "create")],
      //    //       role: OPTION,
      //    //    },
      //    //    { searchString: this.searchString }
      //    // );
      //    // optionCreate.addEventListener("click", (event) => {
      //    //    event.stopPropagation();
      //    //    this.onOptionCreateClick(optionCreate);
      //    // });
      //    // optionCreate.addEventListener("mousedown", this.onOptionMouseDown.bind(this));
      //    // this.DOM[OPTIONS].appendChild(optionCreate);
      // }

      return options.filter((option) => {
         if (this.opts.searchable && this.searchString && option.label.indexOf(this.searchString) == -1) {
            return false;
         }
         return !((this.isOptionSelected(option) && this.opts.hideSelected) || (this.isOptionDisabled(option) && this.opts.hideDisabled) || (!option.value && this.opts.multiply));
      });
   }
   isOptionSelected(option) {
      return this.selected.has(option);
   }
   isOptionDisabled(option) {
      return option.disabled || (option.optgroup && this.optgroups.find(({ label }) => option.optgroup == label).disabled);
   }
   isOptionFocused(option) {
      return this.activeIndex == this.availableOptions.indexOf(option);
   }
   get isDropdownEmpty() {
      return !this.availableOptions.length && !this.searchString;
   }
   renderOptions() {
      this.DOM[OPTIONS].innerHTML = "";
      let optgroupsElems = {};
      this.optgroups.forEach((optgroup) => {
         optgroupsElems[optgroup.label] = {
            optgroup,
            elem: this.renderNode(
               OPTGROUP,
               {
                  class: [this.getStateClass(OPTGROUP, DISABLED, optgroup[DISABLED])],
                  [ARIA_DISABLED]: optgroup[DISABLED],
               },
               optgroup
            ),
         };
      });
      const availableOptions = this.availableOptions;
      if (this.activeIndex > availableOptions.length - 1) {
         this.activeIndex = availableOptions.length - 1;
      }

      if (availableOptions.length) {
         availableOptions.forEach((option, i) => {
            const optionEl = this.createOption(option, i);
            const isSelected = this.isOptionSelected(option);
            attr(optionEl, ARIA_SELECTED, isSelected);
            toggleClasses(optionEl, this.getStateClass(OPTION, SELECTED), isSelected);
            let optgroupsElem = optgroupsElems[option.optgroup];
            if (optgroupsElem) {
               let target = getElement("[data-optgroup-list]", optgroupsElem.elem) || optgroupsElem.elem;
               target.appendChild(optionEl);
               if (i + 1 <= availableOptions.length - 1 && availableOptions[i + 1].optgroup !== option.optgroup) {
                  if (this.opts.hideDisabled && optgroupsElem.optgroup.disabled) return;
                  this.DOM[OPTIONS].appendChild(optgroupsElem.elem);
               }
            } else {
               this.DOM[OPTIONS].appendChild(optionEl);
            }
         });
      } else if (this.searchString) {
         this.DOM[OPTIONS].appendChild(this.renderNode(NO_OPTIONS, {}, this.opts.noOptions));
      } else if (this.isDropdownEmpty) {
         this.updateMenuState(false);
      }
      this.updatePlaceholder();
   }

   selectOption(index) {
      // update state
      this.activeIndex = index;
      if (this.opts.searchable && !this.availableOptions.length) {
         return;
      }
      this.addSelected(this.availableOptions[index]);
      this.renderOptions();
   }
   getStateClass(name, state, s = true) {
      return s ? [name == WRAPPER ? this.opts.baseClass : this.opts.baseClass + (ELEMS_SOLO.includes(name) ? "-" : "__") + camelToKebab(name), camelToKebab(state)].filter(Boolean).join("--") : "";
   }
   setState(name, state, s = true) {
      toggleClasses(this.DOM[name], this.getStateClass(name, state), s);
   }
   updateMenuState(open) {
      // this.DOM[CONTROL].focus({ preventScroll: true });

      if (this.open === open || (open && (this.opts.disabled || this.opts.locked || this.isDropdownEmpty))) {
         return;
      }

      this.open = open;

      this.setState(WRAPPER, "expanded", open);
      attr(this.DOM[CONTROL], ARIA_EXPANDED, open);
      this.setState(DROPDOWN, "active", open);
      // toggleClasses(this.DOM[DROPDOWN], this.opts.classes.dropdownActive, open);

      // update activedescendant
      attr(this.DOM[CONTROL], ARIA_ACTIVEDESCENDANT, open && this.id + "-" + this.activeIndex, true);

      if (!open && this.opts.searchable) {
         this.DOM[CONTROL].value = "";
         this.searchString = "";
      }

      // this.renderOptions();
      this.updateFocused();

      this.buffer.length = 0;

      return open;

      // move focus back to the combobox, if needed
      // if (!this.opts.openOnFocus) {
      // this[CONTROL].focus();
      // }
   }
   // static get(elem) {
   //    for (let [id, select] of this.instances) {
   //       if ([id, select.DOM[BASE]].includes(elem)) {
   //          return select;
   //       }
   //    }
   // }
   show() {
      this.updateMenuState(true);
   }
   hide() {
      this.updateMenuState(false);
   }
   toggle() {
      this.updateMenuState(!this.open);
   }
   // static initAll() {
   //    return getElements("[data-select]").map((select) => new Select(select));
   // }
}

export default Select;
