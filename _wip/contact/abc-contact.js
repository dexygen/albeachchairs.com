{
    const contactModal = document.querySelector(".abc-contact-modal");
    const contactButton = document.querySelector(".abc-contact-button");

    // BEGIN: declarations outside of contactButton/addEventListener/setTimeout
    let contactForm;
    let formSubmitButton;
    
    let formErrorMsgContainer;
    let formErrorMsgOnName;
    let formErrorMsgOnEmail;
    let formErrorMsgOnStartDate;
    let formErrorMsgOnDuration;

    let formFieldDelivery;
    let formFieldProperty;
    let formFieldStartDate;
    let formFieldDuration;
    // END    

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

                contactForm = document.querySelector(".abc-contact-form");
                formSubmitButton = document.querySelector(".abc-contact-form-submit");
                
                formErrorMsgContainer = contactModal.querySelector(".abc-contact-form-msg-container");
                formErrorMsgOnName = contactModal.querySelector(".abc-contact-form-error-name");
                formErrorMsgOnEmail = contactModal.querySelector(".abc-contact-form-error-email");
                formErrorMsgOnStartDate = contactModal.querySelector(".abc-contact-form-error-start-date");
                formErrorMsgOnDuration = contactModal.querySelector(".abc-contact-form-error-duration");

                formFieldDelivery = contactForm.querySelector(".abc-contact-form-field-delivery");
                formFieldProperty = contactForm.querySelector(".abc-contact-form-field-property");
                formFieldStartDate = contactForm.querySelector(".abc-contact-form-field-start-date");
                formFieldDuration = contactForm.querySelector(".abc-contact-form-field-duration");
                
                // BEGIN: Only allow Delivery checkbox OR property selection menu, to have a value
                formFieldDelivery.addEventListener("click", () => {
                    if (formFieldDelivery.checked) {
                        formFieldProperty.value = 0;
                    }
                });
                formFieldProperty.addEventListener("change", () => {
                    if (formFieldProperty.value) {
                        formFieldDelivery.checked = false;
                    }
                })
                // END

                formSubmitButton.addEventListener("click", () => {
                    resetFormErrorMessages(formErrorMsgContainer);
                    let errorMessages = contactFormErrorMessages(contactForm);

                    if (errorMessages) {
                        formErrorMsgContainer.classList.remove("is-hidden");
                        errorMessages.forEach((msg) => {
                            if (msg === "name") {
                                formErrorMsgOnName.classList.remove("is-hidden");
                            }
                            if (msg === "email") {
                                formErrorMsgOnEmail.classList.remove("is-hidden");
                            }
                            if (msg === "startDate") {
                                formErrorMsgOnStartDate.classList.remove("is-hidden");
                            }
                            if (msg === "duration") {
                                formErrorMsgOnDuration.classList.remove("is-hidden");
                            }
                        });
                    }
                    else {
                        let payload = JSON.stringify(Object.fromEntries(new FormData(contactForm)));
                        // console.log(payload); return;

                        axios.post("./contact/send_email.php", payload)
                            .then(response => {
                                console.log(response.data);
                            })
                            .catch(err => { /* Handle errors */ });              
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
              if (fieldName === "startDate" && val !== "") {
                const today = new Date();
                today.setHours(0,0,0,0); // sets to first millisecond of today's date
                if (new Date(val) < today) {
                  errorMessages = errorMessages || [];
                  errorMessages.push(fieldName);          
                }
              }
              if (fieldName === "duration" && val <= -1) {
                errorMessages = errorMessages || [];
                errorMessages.push(fieldName);
              }
            }

            if (!errorMessages) { // check for any information besides just name and email
                // console.log(JSON.stringify(Array.from(formData.entries())));
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