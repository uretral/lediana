export default (string) => {
   let div = document.createElement("div");
   div.innerHTML = string;
   return div.firstElementChild;
};
