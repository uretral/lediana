import isObject from "./isObject.js";
function mergeDeep(target, ...sources) {
   sources.forEach((source) => {
      if (!isObject(target) || !isObject(source)) {
         return source;
      }
      Object.keys(source).forEach((key) => {
         const targetValue = target[key];
         const sourceValue = source[key];
         if (Array.isArray(targetValue) && Array.isArray(sourceValue)) {
            target[key] = targetValue.concat(sourceValue);
         } else if (isObject(targetValue) && isObject(sourceValue)) {
            target[key] = mergeDeep(Object.assign({}, targetValue), sourceValue);
         } else {
            target[key] = sourceValue;
         }
      });
   });

   return target;
}

export default mergeDeep;
