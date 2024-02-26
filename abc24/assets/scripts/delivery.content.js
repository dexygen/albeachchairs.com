(() => {
	setupDeliveryPage();
	setupReservationForm();
	
	function setupDeliveryPage() {
		setupDeliveryTabs();
		
		const abcReturnHomeLink = document.querySelector(".abc-return-home-link");
		abcReturnHomeLink.addEventListener("click", () => {
			document.location.href = "./home.php";
		});
		
		function setupDeliveryTabs() {
			const abcDeliveryTabs = document.querySelector(".abc-delivery-tabs");
			[...abcDeliveryTabs.querySelectorAll("li")].forEach(tab => {
				tab.addEventListener("click", () => {
					let activeTab = abcDeliveryTabs.querySelector("li.is-active");
					let inactiveTab = abcDeliveryTabs.querySelector("li:not(.is-active)");
					
					activeTab.classList.remove("is-active");
					activeTab.querySelector("a").classList.add("has-background-light");
					
					inactiveTab.classList.add("is-active");
					inactiveTab.querySelector("a").classList.remove("has-background-light");

					let visibleInfoSection = document.querySelector(".abc-delivery-info-sections > section:not(.is-hidden)");
					let hiddenInfoSection = document.querySelector(".abc-delivery-info-sections > section.is-hidden")
					
					visibleInfoSection.classList.add("is-hidden");
					hiddenInfoSection.classList.remove("is-hidden");
				});
			});
		}
	}
	
	function setupReservationForm() {
		const deliveryReservationForm = document.querySelector(".abc-delivery-reservation-form");
		
		// elements needed by closeEntirely and/or clearNotifications (called by submit, reset, and closeEntirely)
		const deliveryReservationModal = document.querySelector(".abc-delivery-reservation-modal");
		const errorMessageContainer = document.querySelector(".abc-delivery-submit-validation-errors");
		const errorMessageListElement = errorMessageContainer.querySelector("ul");
		const deliveryServerErrorNotification = document.querySelector(".abc-delivery-submit-server-error");
		const deliveryConfirmationNotification = document.querySelector(".abc-delivery-submit-confirmation");
		let calendar;
		
		setupModal();
		setupFormReset();
		setupFormSubmit();
		
		document.addEventListener('DOMContentLoaded', () => {
			const hiddenReservationDatesField = document.querySelector('input[name="reservationDates"]');
			calendar = new VanillaCalendar('#abc-reservation-calendar', {
				date: {
					min: new Date().toISOString().substring(0, 10), // TODO: Today OR the beginning of season?
					max: '2024-10-27',
				},
				settings: {
					visibility: {
						weekend: false,
					},
					selection: {
					  day: 'multiple-ranged',
					},
				},
				  actions: {
					clickDay() {
					    hiddenReservationDatesField.value = calendar.selectedDates;
					},
				  },
			});
			calendar.init();
		});
		
		function setupModal() {
			const deliveryReservationLink = document.querySelector(".abc-delivery-reservation-link");
			
			deliveryReservationLink.addEventListener("click", () => {
				deliveryReservationModal.classList.add("is-active");		
			});
			
			// Setup close buttons
			const reservationModalCloseButtons = document.querySelectorAll(".abc-delivery-reservation-modal-close");
			[...reservationModalCloseButtons].forEach(closeButton => {
				closeButton.addEventListener("click", () => {
					closeEntirely();
				});
			});

            // Setup pricing link, including close functionality
			{
				const abcDeliveryPricingLink = document.querySelector(".abc-delivery-pricing-link");
				const abcDeliveryPricingModal = document.querySelector(".abc-delivery-pricing-modal");

				abcDeliveryPricingLink.addEventListener("click", () => {
					abcDeliveryPricingModal.classList.add("is-active");
				});
				
				const pricingModalCloseButtons = document.querySelectorAll(".abc-delivery-pricing-modal-close");
				[...pricingModalCloseButtons].forEach(closeButton => {
					closeButton.addEventListener("click", () => {
						abcDeliveryPricingModal.classList.remove("is-active");
					});
				});	
			}			
		}
		
		function closeEntirely() {
			deliveryReservationForm.reset();
			calendar.init();
			deliveryReservationModal.classList.remove("is-active");
			clearNotifications();			
		}
		
		function clearNotifications() {
			// perform when clicking CLOSE and RESET and before form validation after clicking SUBMIT
			errorMessageListElement.innerHTML = ""; // remove errors
			errorMessageContainer.classList.add("is-hidden");
			deliveryConfirmationNotification.classList.add("is-hidden");
		}
		
		function setupFormReset() {
			const formResetButton = document.querySelector(".abc-delivery-reservation-form-reset");
			formResetButton.addEventListener("click", () => {
				deliveryReservationForm.reset();
				clearNotifications();
			});
		}
		
		function setupFormSubmit() {
			const formSubmitButton = document.querySelector(".abc-delivery-reservation-form-submit");
            formSubmitButton.addEventListener("click", () => {
				const formDataObj = Object.fromEntries(new FormData(deliveryReservationForm));
				const reservationData = coerceFormData(formDataObj);
				let invalidFormData;
				
				clearNotifications();
				
				if (invalidFormData = evaluateReservationData(reservationData), invalidFormData) {
					invalidFormData.forEach(fieldLabel => {
						const li = document.createElement('li');
						li.appendChild(document.createTextNode(fieldLabel));
						errorMessageListElement.appendChild(li);						
					});
					
					errorMessageContainer.classList.remove("is-hidden");
					errorMessageContainer.scrollIntoView({behavior: "smooth"});
				}
				else {
					const reservationPayload = JSON.stringify(reservationData);
					axios.post("./includes/reservation.form.completion.php", reservationPayload)
						.then(response => {
							if (response.status === 200 && response.data.mail_success) {
								deliveryConfirmationNotification.classList.remove("is-hidden");
								deliveryConfirmationNotification.scrollIntoView({behavior: "smooth"});
								setTimeout(() => { closeEntirely() }, 8000);
							}
							else {
								deliveryServerErrorNotification.classList.remove("is-hidden");
								deliveryServerErrorNotification.scrollIntoView({behavior: "smooth"});
							}
						})
						.catch(err => { 
							deliveryServerErrorNotification.classList.remove("is-hidden");
							deliveryServerErrorNotification.scrollIntoView({behavior: "smooth"});
						});
				}
			});
			
			function coerceFormData(formDataObj) {
				const coercedData = JSON.parse(JSON.stringify(formDataObj));
				coercedData.deliveryCity = coercedData.deliveryCity || "";
				coercedData.reservationDates = coercedData.reservationDates === "[]" ? "" : coercedData.reservationDates;
				coercedData.reservationLength = coercedData.reservationDates.split(",").length;
				console.log(coercedData.reservationDates, coercedData.reservationDates.split(","), coercedData.reservationLength);
				Object.keys(coercedData).forEach(key => coercedData[key] = coercedData[key].toString().trim());
				return coercedData;
			}
			
			function evaluateReservationData(reservationData) {
			    const requiredFieldLabels = requiredReservationFields();
				let invalidFormData = [];
				
				for (const [fieldName, label] of requiredFieldLabels) {
					if (reservationData[fieldName] === "") {
						invalidFormData.push(label + " is required");
					}
				}
				
				// Special cases, move into function if they become too numerous
				{
					const emailRegex = /([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|"([]!#-[^-~ \t]|(\\[\t -~]))+")@([!#-'*+/-9=?A-Z^-~-]+(\.[!#-'*+/-9=?A-Z^-~-]+)*|\[[\t -Z^-~]*])/;
					// as to the above, standards-based, regex, see: https://stackoverflow.com/a/26989421/34806
					if (reservationData.email && !emailRegex.test(reservationData.email)) {
						invalidFormData.unshift("Email address not in proper format");
					}
					
					if (reservationData.numberOfSets && reservationData.numberOfSets < 2 ) {
						invalidFormData.unshift("At least 2 sets required for delivery");
					}
				}
				
				return invalidFormData.length ? invalidFormData : null;
				
				function requiredReservationFields() {
					const formFields = document.querySelectorAll("div.field");
					const fieldLabels = [...formFields].reduce((labels, field) => {
						let fieldLabelSpan;
						let fieldLabelInput;
						if (fieldLabelSpan = field.querySelector("label > span"), fieldLabelSpan) {
							if (fieldLabelInput = field.querySelector("input"), fieldLabelInput) {
								const labelName = fieldLabelInput.getAttribute("name");
								const labelValue = fieldLabelSpan.innerText.replace("\n", " ");
								if (!labelName.startsWith("extra")) {
								  labels.set(labelName, labelValue);
								}
							}
						}
						return labels;
					}, new Map());
					
					return fieldLabels;
				}
			}
		}
	}
})();