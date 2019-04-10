function showMobileMenu() {
  let navItems = document.getElementsByClassName("headerNav")[0];
  navItems.classList.add("nav-items--active");
}
function hideMobileMenu() {
  let navItems = document.getElementsByClassName("headerNav")[0];
  navItems.classList.remove("nav-items--active");
}
window.addEventListener("DOMContentLoaded", function() {
  let nav = document.getElementsByClassName("headerNav")[0];
  if (nav) {
    nav
      .getElementsByClassName("nav-expand-mobile-menu")[0]
      .addEventListener("click", showMobileMenu);
    nav
      .getElementsByClassName("nav-more-btn")[0]
      .addEventListener("click", showMobileMenu);
  }
  let nav_mobile_background = document.getElementsByClassName(
    "nav-mobile-background"
  )[0];
  if (nav_mobile_background) {
    nav_mobile_background.addEventListener("click", hideMobileMenu);
  }
  let nav_mobile_back_btn = document.getElementsByClassName(
    "nav-mobile-back-btn"
  )[0];
  if (nav_mobile_back_btn) {
    nav_mobile_back_btn.addEventListener("click", hideMobileMenu);
  }
});
