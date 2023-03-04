const abcPropertyImgModalEl = document.querySelector(".abc-property-img-modal");
const abcPropertyListItemsEls = document.querySelectorAll(".abc-property-city-section li");
const abcPropertyImgModalCloseEls = document.querySelectorAll(".abc-property-img-modal-close");

[...abcPropertyListItemsEls].forEach(propertyListItemEl => {
  propertyListItemEl.addEventListener("click", () => {;
    abcPropertyImgModalEl.classList.add("is-active");
    let abcPropertyImgEl = abcPropertyImgModalEl.querySelector(".abc-property-img");
    abcPropertyImgEl.src = propertyListItemEl.dataset.abcPropertyImgSrc;
  });
});

[...abcPropertyImgModalCloseEls].forEach(imageModalCloseEl => {
  imageModalCloseEl.addEventListener("click", () => {
    abcPropertyImgModalEl.classList.remove("is-active");
  });
});