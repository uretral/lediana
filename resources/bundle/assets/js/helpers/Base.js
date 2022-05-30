import cloneDeep from "./cloneDeep.js";
import { getElements } from "./dom.js";
import camelToKebab from "./camelToKebab.js";

const VERSION = "0.1";

class Base {
   constructor({ opts, elem }) {
      // console.log(instance.name);
      if (!elem) return;
      this.opts = cloneDeep({ ...this.constructor.defaultSettings, ...JSON.parse(elem.dataset[this.constructor.name] || "{}"), ...opts });
      this.id = elem.id ||= this.opts.initialId ?? camelToKebab(this.constructor.name) + "-" + Math.random().toString(36).substring(2, 9);

      this._events = {};
      return this;
   }
   static get VERSION() {
      return VERSION;
   }
   get inDOM() {
      return !!document.getElementById(this.id);
   }
   _emit(eventName, detail = this) {
      this.opts.events[eventName]?.(this);
      (this.baseNodeEvent || this.baseNode).dispatchEvent(new CustomEvent(eventName, { detail }));
   }
   on(eventNames, handler, opts) {
      eventNames.split(" ").forEach((eventName) => {
         this._events[eventName] = handler;
         this.baseNode.addEventListener(eventName, handler, opts);
      });
   }
   off(eventNames, handler, opts) {
      eventNames.split(" ").forEach((eventName) => {
         let eventHandler = handler || this._events[eventName];
         if (eventHandler) {
            this.baseNode.removeEventListener(eventName, eventHandler, opts);
            delete this._events[eventName];
         }
      });
   }
   get instances() {
      return this.constructor.instances;
   }
   get defaultSettings() {
      return this.constructor.defaultSettings;
   }
   static get(elem) {
      for (let [id, instance] of this.instances) {
         if ([id, instance.baseNode].includes(elem)) {
            return instance;
         }
      }
   }
   static getOrCreate(elem, opts) {
      return this.get(elem, opts) || new this(elem, opts);
   }
   static initAll(opts) {
      return getElements(this.defaultSettings.selectors[this.name.toLowerCase()]).map((elem) => this.getOrCreate(elem, opts));
   }
   static updateDefaultSettings(opts) {
      return cloneDeep({ ...this.defaultSettings, ...opts });
   }
}
export default Base;
