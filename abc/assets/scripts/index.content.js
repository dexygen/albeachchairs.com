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