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
                    resetFormErrorMessages(formErrorMsgContainer);
                    
                    let errorMessages = contactFormErrorMessages(contactForm);
                    if (errorMessages) {
                        formErrorMsgContainer.classList.remove("is-hidden");
                        errorMessages.forEach((field) => {
                            if (field === "name") {
                                formErrorMsgOnName.classList.remove("is-hidden");
                            }
                            if (field === "email") {
                                formErrorMsgOnEmail.classList.remove("is-hidden");
                            }
                        });
                    }
                });
            }
        });

        function contactFormErrorMessages(contactForm) {
            let errorMessages;
            
            const formData = new FormData(contactForm);
            const emailRegex = /([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|"([]!#-[^-~ \t]|(\\[\t -~]))+")@([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\[[\t -Z^-~]*])/;
            // as to the above, standards-based, regex, see: https://stackoverflow.com/a/26989421/34806

            for (let [fieldName, val] of formData.entries()) {
              if (fieldName === "name" && val.trim().length < 2) {
                errorMessages = errorMessages || [];
                errorMessages.push(fieldName);
              }
              if (fieldName === "email" && !emailRegex.test(val.trim())) {
                errorMessages = errorMessages || [];
                errorMessages.push(fieldName);
              }
            }

            return errorMessages;
        }

        function resetFormErrorMessages(container) {
            container.classList.add("is-hidden");
            const errorMsgs = container.querySelectorAll("[class^='abc-contact-form-error-']");
            errorMsgs.forEach((errorMsgEl) => { errorMsgEl.classList.add("is-hidden") });
        }
    });
}