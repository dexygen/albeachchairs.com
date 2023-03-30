{
    const contactModal = document.querySelector(".abc-contact-modal");
    const contactButton = document.querySelector(".abc-contact-button");

    // BEGIN: declarations outside of contactButton/addEventListener/setTimeout
    let contactForm;
    let formSubmitButton;
    
    let formErrorMsgContainer;
    let formErrorMsgOnName;
    let formErrorMsgOnEmail;

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

                formFieldDelivery = contactForm.querySelector(".abc-contact-form-field-delivery");
                formFieldProperty = contactForm.querySelector(".abc-contact-form-field-property");
                // abc-contact-form-field-start-date
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

                /* 
                  BEGIN: Initialize start date to following day; 
                  see: https://stackoverflow.com/a/54341296/34806
                */
                const nextDay = (function() {
                    const nextDay = new Date();
                    nextDay.setDate(nextDay.getDate() + 1);
                    const month = (nextDay.getMonth() + 1).toString().padStart(2, '0');
                    const day = nextDay.getDate().toString().padStart(2, '0');
                    return `${nextDay.getFullYear()}-${month}-${day}`;
                })();
                formFieldStartDate.value = nextDay;
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