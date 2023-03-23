{
    const contactModal = document.querySelector(".abc-contact-modal");
    const contactButton = document.querySelector(".abc-contact-button");
    
    {
        let modalCloseButtons;
        let contactFormEls;

        contactButton.addEventListener("click", () => {
            contactModal.classList.add("is-active");

            if (!modalCloseButtons) {
                setTimeout(() => { // setTimeout waits until after modal renders
                    modalCloseButtons = document.querySelectorAll(".abc-contact-modal-close");

                    // add event listeners only once upon initialization
                    [...modalCloseButtons].forEach(closeButton => {  
                        closeButton.addEventListener("click", () => {
                            contactModal.classList.remove("is-active");
                        });
                    });
                });
            }

            if (!contactFormEls) {
                setTimeout(() => {
                    contactEls = document.querySelectorAll("*[class^='abc-contact-form-']");
                })
            }
        });
    }
}