import toMs from "./toMs.js";
import camelToKebab from "./camelToKebab.js";

const DURATION = "duration";
const DURATION_ENTER = DURATION + "-enter";
const DURATION_LEAVE = DURATION + "-leave";
const EVENT_OPEN = "open";
const EVENT_CLOSE = "close";

function collectAnimations({ elem, promises, eventName }) {
   let duration;
   if (eventName == EVENT_OPEN || eventName == EVENT_CLOSE) {
      let computedStyle = getComputedStyle(elem);
      let getDuration = (name) => elem.dataset[camelToKebab(name)] || computedStyle.getPropertyValue("--" + name);
      duration = toMs(getDuration(eventName == EVENT_OPEN ? DURATION_ENTER : DURATION_LEAVE) || getDuration(DURATION));
   }
   promises.duration = !isNaN(duration) ? new Promise((resolve) => setTimeout(resolve, duration)) : null;

   if (this.opts.awaitingEvents.includes(eventName)) {
      promises.event = new Promise((resolve) => {
         this.animationDone = resolve;
      });
   } else {
      promises.event = null;
   }

   const animations = elem.getAnimations();
   promises.animation = animations.length ? Promise.allSettled(animations.map(({ finished }) => finished)) : null;

   const primaryPromise = promises.duration || promises.event || promises.animation;

   return {
      allPromises: promises,
      primaryPromise,
   };
}
export default collectAnimations;
