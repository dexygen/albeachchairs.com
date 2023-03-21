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


/* CONTACT MODAL FUNCTIONALITY */
const contactButtonLink = document.querySelector(".abc-contact-form-link");
const contactModal = document.querySelector(".abc-contact-modal");
const modalEmailForm = document.querySelector(".abc-email-form");
const modalSubmitButton = document.querySelector(".abc-contact-modal-submit");
const modalCloseMechanisms = document.querySelectorAll(".abc-contact-modal-close");

contactButtonLink.addEventListener("click", () => contactModal.classList.add("is-active"));
[...modalCloseMechanisms].forEach(closeMechanism => {  
  closeMechanism.addEventListener("click", () => contactModal.classList.remove("is-active"));
});

modalSubmitButton.addEventListener("click", () => {
  let payload = JSON.stringify(Object.fromEntries(new FormData(modalEmailForm)));
  axios.post("./contact/send_email.php", payload)
    .then(response => {
        console.log(response.data);
    })
    .catch(err => {
        // Handle errors
        console.error(err);
    })
    .finally(() => contactModal.classList.remove("is-active"));
});


/* PROPERTY IMAGES FUNCTIONALITY */
const propertyImgModalEl = document.querySelector(".abc-property-img-modal");
const propertyImgModalTitleEl = propertyImgModalEl.querySelector(".abc-property-img-modal-title");
const propertyImgModalCloseEls = propertyImgModalEl.querySelectorAll(".abc-property-img-modal-close");

const propertyListItemsEls = document.querySelectorAll(".abc-property-city-section li");
[...propertyListItemsEls].forEach(propertyListItemEl => {
  propertyListItemEl.addEventListener("click", () => {
    let propertyImgEl = propertyImgModalEl.querySelector(".abc-property-img");
    propertyImgEl.src = propertyListItemEl.dataset.abcPropertyImgSrc;
    propertyImgModalEl.classList.add("is-active");
    propertyImgModalTitleEl.innerHTML = propertyListItemEl.querySelector("a").innerHTML;
  });
});

[...propertyImgModalCloseEls].forEach(imageModalCloseEl => {
  imageModalCloseEl.addEventListener("click", () => {
    propertyImgModalEl.classList.remove("is-active");
  });
});


/* MOBILE MENU FUNCTIONALITY */
const toggleMenuMobile = document.querySelector(".abc-toggle-menu-mobile");
const menuLinks = document.querySelector(".abc-menu-links");

toggleMenuMobile.addEventListener("click", function(selection) {
  if (selection.target.innerHTML === "Show Menu") {
    selection.target.innerHTML = "Hide Menu";
    menuLinks.classList.remove("is-hidden-mobile");
    menuLinks.classList.add("is-block");
  }
  else {
    selection.target.innerHTML = "Show Menu";
    menuLinks.classList.remove("is-block");
    menuLinks.classList.add("is-hidden-mobile");
  }
});