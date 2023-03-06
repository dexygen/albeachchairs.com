/* CAROUSEL FUNCTIONALITY */
const carouselRoot = document.getElementById("abc-carousel");
const carouselImgDivs = [...carouselRoot.querySelectorAll("div")];

setInterval(() => {
  const currentIsBlockIndex = carouselImgDivs.findIndex((imgDiv) => {
    return imgDiv.className === 'is-block';
  });
  const nextIsBlockIndex = currentIsBlockIndex === carouselImgDivs.length - 1 ? 0 : currentIsBlockIndex + 1;

  carouselImgDivs[currentIsBlockIndex].classList.remove('is-block');
  carouselImgDivs[currentIsBlockIndex].classList.add('is-hidden');

  carouselImgDivs[nextIsBlockIndex].classList.remove('is-hidden');
  carouselImgDivs[nextIsBlockIndex].classList.add('is-block');
}, 4000);


/* PROPERTY IMAGES FUNCTIONALITY */
const propertyImgModalEl = document.querySelector(".abc-property-img-modal");
const propertyImgModalTitleEl = propertyImgModalEl.querySelector(".abc-property-img-modal-title");
const abcPropertyImgModalCloseEls = propertyImgModalEl.querySelectorAll(".abc-property-img-modal-close");
const abcPropertyListItemsEls = document.querySelectorAll(".abc-property-city-section li");

[...abcPropertyListItemsEls].forEach(propertyListItemEl => {
  propertyListItemEl.addEventListener("click", () => {;
    propertyImgModalEl.classList.add("is-active");
    let propertyImgEl = propertyImgModalEl.querySelector(".abc-property-img");
    propertyImgEl.src = propertyListItemEl.dataset.abcPropertyImgSrc;
    
    let propertyImgLinkEl = propertyListItemEl.querySelector("a");
    propertyImgModalTitleEl.innerHTML = propertyImgLinkEl.innerHTML;

    console.log(JSON.stringify(getComputedStyle(propertyImgModalEl.querySelector(".modal-card-foot")), null, 2));
  });
});

[...abcPropertyImgModalCloseEls].forEach(imageModalCloseEl => {
  imageModalCloseEl.addEventListener("click", () => {
    propertyImgModalEl.classList.remove("is-active");
  });
});


/* MOBILE MENU FUNCTIONALITY */
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
});