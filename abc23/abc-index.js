{
  enableCarousel();
  enablePropertyImages();
  enableMobileMenu();

  const abcAnchorLinks = document.querySelectorAll("a[href^='#']");

  function enableCarousel() {
    const carouselRoot = document.getElementById("abc-carousel");
    const carouselImgDivs = [...carouselRoot.querySelectorAll("div")];

    setInterval(() => {
      const currentIsBlockIndex = carouselImgDivs.findIndex((imgDiv) => {
        return imgDiv.className === 'is-block';
      });
      const nextIsBlockIndex = currentIsBlockIndex === carouselImgDivs.length - 1 ? 0 : currentIsBlockIndex + 1;
      // the above can be shortened, I've seen a code snippet on the internet

      carouselImgDivs[currentIsBlockIndex].classList.remove('is-block');
      carouselImgDivs[currentIsBlockIndex].classList.add('is-hidden');
    
      carouselImgDivs[nextIsBlockIndex].classList.remove('is-hidden');
      carouselImgDivs[nextIsBlockIndex].classList.add('is-block');
    }, 4000);
  }

  function enablePropertyImages() {
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
  }

  function enableMobileMenu() {
    const toggleMenuMobile = document.querySelector(".abc-toggle-menu-mobile");
    const menuLinks = document.querySelector(".abc-menu-links");
    
    toggleMenuMobile.addEventListener("click", function(toggle) {
      if (toggle.target.innerHTML === "Show Menu") {
        toggle.target.innerHTML = "Hide Menu";
        menuLinks.classList.remove("is-hidden-mobile");
        menuLinks.classList.add("is-block");
      }
      else {
        toggleHidden(toggle);
      }

      // menu needs to be hidden whenever anchors are clicked
      const abcAnchorLinks = document.querySelectorAll("a[href^='#']");
      [...abcAnchorLinks].forEach(anchorLink => {
        anchorLink.addEventListener("click", () => {
          toggleHidden(toggle);         
        });
      });

      function toggleHidden(toggle) {
        toggle.target.innerHTML = "Show Menu";
        menuLinks.classList.remove("is-block");
        menuLinks.classList.add("is-hidden-mobile");
      }
    });
  }
}