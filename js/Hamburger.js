class Hamburger {
  constructor() {
    this.hamburger = document.querySelector(".hamburger");
    this.aside = document.querySelector(".panel__menu");
    this.handleHamburger();
  }
  handleHamburger() {
    if (!this.hamburger) {
      return;
    }
    this.hamburger.addEventListener("click", () => {
      this.aside.classList.toggle("panel__menu--active");
    });
  }
}
