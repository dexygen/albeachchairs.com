{
    const contactModal = document.querySelector(".abc-contact-modal");
    const contactButton = document.querySelector(".abc-contact-button");
    
    let eventListenersInitialized;

    contactButton.addEventListener("click", () => {
        setTimeout(() => { // waits for modal and its contents to render
            contactModal.classList.add("is-active");
            
            // only add event listeners once
            if (!eventListenersInitialized) {
                eventListenersInitialized = true;
                
                const modalCloseButtons = document.querySelectorAll(".abc-modal-close");
                [...modalCloseButtons].forEach(closeButton => {  
                    closeButton.addEventListener("click", () => {
                        contactModal.classList.remove("is-active");
                    });
                });

                const contactForm = document.querySelector(".abc-contact-form");
                const formSubmitButton = document.querySelector(".abc-contact-form-submit");
                
                const formErrorMsgContainer = document.querySelector(".abc-contact-form-msg-container");
                const formErrorMsgOnName = document.querySelector(".abc-contact-form-error-name");
                const formErrorMsgOnEmail = document.querySelector(".abc-contact-form-error-email");               

                formSubmitButton.addEventListener("click", () => {
                    let errorMessages = contactFormErrorMessages(contactForm);
                    if (errorMessages) {
                        formErrorMsgContainer.classList.remove("is-hidden");
                        errorMessages.forEach((field) => {
                            if (field === "name") {
                                formErrorMsgOnName.classList.remove("is-hidden");
                            }
                        });
                    }
                });
            }
        });

        function contactFormErrorMessages(contactForm) {
            let errorMessages;
            const formData = new FormData(contactForm);
            
            for (let [fieldName, val] of formData.entries()) {
              if (fieldName === "name" && val.trim().length < 2) {
                errorMessages = errorMessages || [];
                errorMessages.push(fieldName);
              }
            }
            
            return errorMessages;
        }
    });
}