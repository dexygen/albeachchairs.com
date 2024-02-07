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
		
		// elements needed by clearNotifications
		const errorMessageContainer = document.querySelector(".abc-reservation-validation-errors");
		const errorMessageListElement = errorMessageContainer.querySelector("ul");
		const deliveryConfirmationNotification = document.querySelector(".abc-reservation-confirmation");
		
		setupModal();
		setupFormReset();
		setupFormSubmit();
		
		document.addEventListener('DOMContentLoaded', () => {
			const hiddenReservationDatesField = document.querySelector('input[name="reservationDates"]');
			const calendar = new VanillaCalendar('#abc-reservation-calendar', {
				date: {
					min: new Date().toISOString().substring(0, 10),
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
			const deliveryReservationModal = document.querySelector(".abc-delivery-reservation-modal");
			
			deliveryReservationLink.addEventListener("click", () => {
				deliveryReservationModal.classList.add("is-active");		
			});
			
			// Setup close buttons
			const reservationModalCloseButtons = document.querySelectorAll(".abc-delivery-reservation-modal-close");
			[...reservationModalCloseButtons].forEach(closeButton => {
				closeButton.addEventListener("click", () => {
					deliveryReservationForm.reset();
					deliveryReservationModal.classList.remove("is-active");
					clearNotifications();
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
					deliveryConfirmationNotification.classList.remove("is-hidden");
					deliveryConfirmationNotification.scrollIntoView({behavior: "smooth"});
					// submit PHP for sending email
				}
			});
			
			function coerceFormData(formDataObj) {
				const coercedData = JSON.parse(JSON.stringify(formDataObj));
				coercedData.deliveryCity = coercedData.deliveryCity || "";
				coercedData.reservationDates = coercedData.reservationDates === "[]" ? "" : coercedData.reservationDates;
				Object.keys(coercedData).forEach(key => coercedData[key] = coercedData[key].trim());
				return coercedData;
			}
			
			function evaluateReservationData(reservationData) {
			    const requiredFieldLabels = requiredReservationFields();
				let invalidFormData = [];
				
				for (const [fieldName, label] of requiredFieldLabels) {
					if (!reservationData[fieldName]) {
						invalidFormData.push(label);
					}
				}
				
				// Special cases, move into function if they become too numerous
				if (reservationData.numberOfSets && reservationData.numberOfSets < 2 ) {
					invalidFormData.unshift("At least 2 sets required for delivery");
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