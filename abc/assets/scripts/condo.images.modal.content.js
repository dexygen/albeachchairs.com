{
  enablePropertyImages();

  function enablePropertyImages() {
    const propertyImgModalEl = document.querySelector(".abc-property-img-modal");
	const propertyListItemsEls = document.querySelectorAll(".abc-condo-img-link");
    const propertyImgModalCloseEls = propertyImgModalEl.querySelectorAll(".abc-property-img-modal-close");
	const propertyImgModalTitleEl = propertyImgModalEl.querySelector(".abc-property-img-modal-title");
	
    [...propertyListItemsEls].forEach(propertyListItemEl => {
      propertyListItemEl.addEventListener("click", () => {
        let propertyImgEl = propertyImgModalEl.querySelector(".abc-property-img");
        propertyImgEl.src = propertyListItemEl.dataset.condoImgSrc;
        propertyImgModalEl.classList.add("is-active");
		propertyImgModalTitleEl.innerHTML = propertyListItemEl.innerHTML;
      });
    });
    
    [...propertyImgModalCloseEls].forEach(imageModalCloseEl => {
      imageModalCloseEl.addEventListener("click", () => {
        propertyImgModalEl.classList.remove("is-active");
      });
    });
  }
}