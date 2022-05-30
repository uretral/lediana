const getElements = (elem, parent = document) => {
   return typeof elem == "string" ? [...parent.querySelectorAll(elem)] : [elem];
};
const getElement = (elem, parent = document) => {
   return typeof elem == "string" ? parent.querySelector(elem) : elem;
};
const toggleClasses = (elem, classes, s) => {
   if (!classes || !elem) return;
   classes = Array.isArray(classes) ? classes : classes.split(" ");
   elem.classList[s ? "add" : "remove"](...classes.filter(Boolean));
};

export { getElements, getElement, toggleClasses };
