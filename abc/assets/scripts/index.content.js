const abcDeliveryLink = document.querySelector(".abc-need-delivery-button");
const abcCondosLink = document.querySelector(".abc-staying-condo-button");
const abcCondosListModalEl = document.querySelector(".abc-condos-list-modal");
const abcCondosListCloseEls = abcCondosListModalEl.querySelectorAll(".abc-condos-list-close");
const abcCondosLinkEl = document.querySelector(".abc-condos-link");

abcDeliveryLink.addEventListener("click", () => {
	document.location.href = "./delivery.php";
});

abcCondosLink.addEventListener("click", () => {
	document.location.href = "./condos.php";
});

abcCondosLinkEl.addEventListener("click", () => {
  abcCondosListModalEl.classList.add("is-active");
});

[...abcCondosListCloseEls].forEach(modalCloseEl => {
  modalCloseEl.addEventListener("click", () => {
	abcCondosListModalEl.classList.remove("is-active");
  });
});

{
  enableCarousel();

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
}