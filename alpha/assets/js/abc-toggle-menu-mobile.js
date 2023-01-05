const toggleMenuMobile = document.querySelector(".abc-toggle-menu-mobile");
const abcMenuLinks = document.querySelector(".abc-menu-links");

toggleMenuMobile.addEventListener("click", function(selection) {
  if (selection.target.innerHTML === "Show Menu") {
    selection.target.innerHTML = "Hide Menu";
    abcMenuLinks.classList.remove("is-hidden");
    abcMenuLinks.classList.add("is-block");
  }
  else {
    selection.target.innerHTML = "Show Menu";
    abcMenuLinks.classList.remove("is-block");
    abcMenuLinks.classList.add("is-hidden");
  }
})