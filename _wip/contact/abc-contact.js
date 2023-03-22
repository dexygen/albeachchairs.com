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
  // let formEntries = Object.fromEntries(new FormData(modalEmailForm)); 
  // let payload = JSON.stringify(formEntries);

  // implement formValidation but display the following for now
  document.querySelector(".abc-contact-form-message").classList.remove("is-hidden");

  /*
   * Switch to fetch
   *
  axios.post("./contact/send_email.php", payload)
    .then(response => {
        console.log(response.data);
    })
    .catch(err => {
        console.error(err);
    })
    .finally(() => contactModal.classList.remove("is-active"));
  */
});