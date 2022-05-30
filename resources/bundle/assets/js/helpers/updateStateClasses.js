const STATE_TRANSITION_ENTER_ACTIVE = "enterActive";
const STATE_TRANSITION_ENTER_FROM = "enterFrom";
const STATE_TRANSITION_ENTER_TO = "enterTo";
const STATE_TRANSITION_LEAVE_ACTIVE = "leaveActive";
const STATE_TRANSITION_LEAVE_FROM = "leaveFrom";
const STATE_TRANSITION_LEAVE_TO = "leaveTo";

const STATES_ANIMATIONS = [
   STATE_TRANSITION_ENTER_ACTIVE,
   STATE_TRANSITION_ENTER_FROM,
   STATE_TRANSITION_ENTER_TO,
   STATE_TRANSITION_LEAVE_ACTIVE,
   STATE_TRANSITION_LEAVE_FROM,
   STATE_TRANSITION_LEAVE_TO,
];

import camelToKebab from "./camelToKebab.js";
import { toggleClasses } from "./dom.js";
function updateStateClasses({ elem, states, elemName, STATES }) {
   let c = { [false]: [], [true]: [] };
   let transitionName = elem.dataset.transitionName || this.opts.transitionName;
   let baseName = this.constructor.name.toLowerCase();
   STATES.forEach((state) => {
      let classes = `${elemName == baseName ? baseName : `${baseName}-${elemName}`}--${camelToKebab(state)}`.split(" "); //classesObj[state].split(" ");
      let s = states.states.includes(state);
      c[s].push(...classes);
   });
   STATES_ANIMATIONS.forEach((state) => {
      let classes = `${transitionName ? `${transitionName}-${camelToKebab(state)}` : ""} ${elem.dataset[state] ?? ""}`.split(" ");
      let s = states.animations.includes(state);
      c[s].push(...classes);
   });
   [false, true].forEach((s) => toggleClasses(elem, c[s].join(" "), s));
}
export default updateStateClasses;
