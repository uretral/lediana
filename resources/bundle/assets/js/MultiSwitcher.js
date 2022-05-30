const multiSwitchers = new Set();
class MultiSwitcher {
   constructor({ menu, classActive = "active", mode = "class" }) {
      if (multiSwitchers.has(this)) return;
      this.menu = menu;
      this.classActive = classActive;
      this.mode = mode;
      this.links = [...menu.querySelectorAll("[data-menu-link]")];

      this.updateCurrentLink();
      this.setLinksObserver();

      multiSwitchers.add(this);

      // Если элемент видимый - устанавливаем маркер
      if (this.menu.offsetWidth) {
         this.updateMarkerPosition();
      } else {
         // если нет - ждем когда станет видимым, во vue для этого есть mounted состояние
         var observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
               if (entry.intersectionRatio > 0) {
                  // как только появился - удаляем слежение
                  observer.unobserve(entry.target);
                  this.updateMarkerPosition();
               }
            });
         });
         observer.observe(this.menu);
      }
   }
   updateCurrentLink() {
      if (this.mode == "class") {
         this.activeLink = this.links.find((link) => link.classList.contains(this.classActive));
      }
      if (this.mode == "radio") {
         this.activeLink = this.links.find((link) => link && link.querySelector(":checked"));
      }
      this.links.forEach((link) => link.classList.toggle("active", link == this.activeLink));
   }
   updateMarkerPosition() {
      if (!this.activeLink) return;
      const menuRect = this.menu.getBoundingClientRect();
      const linkRect = this.activeLink.getBoundingClientRect();
      this.menu.style.setProperty("--marker-offset-top", linkRect.top - menuRect.top + this.menu.scrollTop + "px");
      this.menu.style.setProperty("--marker-offset-left", linkRect.left - menuRect.left + this.menu.scrollLeft + "px");
      this.menu.style.setProperty("--marker-width", linkRect.width + "px");
      this.menu.style.setProperty("--marker-height", linkRect.height + "px");

      // this.activeLink.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "nearest" });

      // this.menu.scrollTo({
      //    top: 0,
      //    left: linkRect.left - menuRect.left + menuRect.width / 2 - linkRect.width / 2,
      //    behavior: "smooth",
      // });
   }
   setLinksObserver() {
      // тут тоже можно Observer удалить, если во фреймворке есть возможность следить за классом active
      if (this.mode == "radio") {
         this.links.forEach((link) => {
            link.addEventListener("change", (e) => {
               if (e.target.checked) {
                  this.activeLink = link;
                  this.updateCurrentLink();
                  this.updateMarkerPosition();
               }
            });
         });
         return;
      }
      var mutationObserver = new MutationObserver((mutations) => {
         mutations.forEach((mutation) => {
            if (mutation.target.classList.contains(this.classActive)) {
               this.activeLink = mutation.target;
               this.updateMarkerPosition();
            }
         });
      });
      // const resizeObserver = new ResizeObserver((entries) => {
      //    for (let entry of entries) {
      //       this.updateMarkerPosition();
      //    }
      // });

      this.links.forEach((link) => {
         mutationObserver.observe(link, { attributes: true });
         // resizeObserver.observe(link);
      });
   }
   static initAll() {
      document.querySelectorAll("[data-menu]").forEach((menu) => {
         let json = menu.dataset.menu && JSON.parse(menu.dataset.menu);
         new MultiSwitcher({ menu, ...json });
      });
   }
}

export default MultiSwitcher;
