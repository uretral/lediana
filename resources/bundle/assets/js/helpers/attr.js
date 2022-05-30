import isObject from "./isObject.js";
const attr = (elem, name, s, toggle = false) => {
   if (isObject(name)) {
      for (const key in name) {
         attr(elem, key, name[key]);
      }
      return;
   }
   if (s != null) {
      elem.setAttribute(name, s);
   }
   toggle && elem.toggleAttribute(name, s);
};

export default attr;
