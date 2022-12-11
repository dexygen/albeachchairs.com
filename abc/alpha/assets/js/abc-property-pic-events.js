[...document.querySelectorAll(".abc-property-city-section li>a")].forEach((el) => {
  let imgContainer = el.nextElementSibling;
  el.addEventListener("click", (clickEvent) => {
    clickEvent.preventDefault();
  });
  el.addEventListener("mouseover", () => {
    let imgContainer = el.nextElementSibling;
    imgContainer.classList.remove("is-hidden");
  });
  el.addEventListener("mouseout", () => {
    let imgContainer = el.nextElementSibling;
    imgContainer.classList.add("is-hidden");
  });
});