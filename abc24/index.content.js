const abcCondosListModalEl = document.querySelector(".abc-condos-list-modal");
const abcCondosListCloseEls = abcCondosListModalEl.querySelectorAll(".abc-condos-list-close");
const abcCondosLinkEl = document.querySelector(".abc-condos-link");

abcCondosLinkEl.addEventListener("click", () => {
  abcCondosListModalEl.classList.add("is-active");
});

[...abcCondosListCloseEls].forEach(modalCloseEl => {
  modalCloseEl.addEventListener("click", () => {
	abcCondosListModalEl.classList.remove("is-active");
  });
});