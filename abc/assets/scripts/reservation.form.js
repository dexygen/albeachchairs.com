// the following code, above initCalendar() and setTimeout(), is for compatibility on Android, and iPad/iPhone
let calendar;
let calendarTodayButton;

document.addEventListener('DOMContentLoaded', () => {
	initCalendar();
});
// end code for compatability


function initCalendar() {	
	const hiddenReservationDatesField = document.querySelector('input[name="reservationDates"]');
	const tomorrow = (() => {
		const today = new Date();
		const localTomorrow = new Date(today.setDate(today.getDate() + 1));
		const tomorrowTimestamp = localTomorrow.getTime() - localTomorrow.getTimezoneOffset() * 60000;
		// above is necessary as toISOString uses UTC time
		return new Date(tomorrowTimestamp);
	})();
	
	calendar = new VanillaCalendar('#abc-reservation-calendar', {
		date: {
			min: tomorrow.toISOString().substring(0, 10),
			max: '2024-10-27'
		},
		settings: {
			visibility: {
				weekend: false,
			},
			selection: {
			  day: 'multiple-ranged',
			}
		},
		  actions: {
			clickDay() {
				hiddenReservationDatesField.value = calendar.selectedDates;
			},
		  },
	});
	calendar.init();
	
	calendarTodayButtonContainer = document.querySelector(".vanilla-calendar-day__btn_today")?.parentNode;
	calendarTodayButtonContainer?.addEventListener("click", () => {
		alert("For same day reservations, please call 251-233-4000");
	});
}


setTimeout(() => { 
	// setTimeout ensures availability of the following DOM references, corrects issue on iPhone/iPad
	// TODO: rename fields getting rid of "delivery" suffix, they also apply to condos
	const deliveryReservationForm = document.querySelector(".abc-delivery-reservation-form");
	const deliveryReservationModal = document.querySelector(".abc-delivery-reservation-modal");
	const errorMessageContainer = document.querySelector(".abc-delivery-submit-validation-errors");
	const errorMessageListElement = errorMessageContainer.querySelector("ul");
	const deliveryServerErrorNotification = document.querySelector(".abc-delivery-submit-server-error");
	const reservationConfirmationModal = document.querySelector(".abc-reservation-confirmation-modal");
	
	// The following ARE specific to delivery
	const deliveryFeeAgreeButton = document.querySelector('input[value="AGREE"]');
	const deliveryFeeOptOutButton = document.querySelector('input[value="OPT OUT"]');
	const deliveryFeeOptOutNotification = document.querySelector(".abc-delivery-fee-opt-out-notification");
	
	if (deliveryFeeAgreeButton && deliveryFeeOptOutButton) {
		deliveryFeeAgreeButton.addEventListener("click", () => {
			deliveryFeeOptOutNotification.classList.add("is-hidden");
		});
		deliveryFeeOptOutButton.addEventListener("click", () => {
			deliveryFeeOptOutNotification.classList.remove("is-hidden");
			deliveryFeeOptOutNotification.scrollIntoView({behavior: "smooth"});			
		});
	}
	
	setupModal();
	setupFormReset();
	setupFormSubmit();	
	
	function setupModal() {
		const deliveryReservationLink = document.querySelector(".abc-delivery-reservation-link");
		const condosReservationLink = document.querySelector(".abc-condos-reservation-link");
		
		deliveryReservationLink && deliveryReservationLink.addEventListener("click", () => {
			deliveryReservationModal.classList.add("is-active");		
		});
		
		condosReservationLink && condosReservationLink.addEventListener("click", () => {
			deliveryReservationModal.classList.add("is-active");		
		});
		
		// Setup close buttons
		const reservationModalCloseButtons = document.querySelectorAll(".abc-delivery-reservation-modal-close");
		[...reservationModalCloseButtons].forEach(closeButton => {
			closeButton.addEventListener("click", () => {
				closeAll();
			});
		});
		
		const reservationConfirmationCloseButtons = document.querySelectorAll(".abc-reservation-confirmation-close");
		[...reservationConfirmationCloseButtons].forEach(closeButton => {
			closeButton.addEventListener("click", () => {
				reservationConfirmationModal.classList.remove("is-active");
				closeAll();
			});
		});

		// Setup pricing link, including close functionality
		{
			const abcDeliveryPricingLink = document.querySelector(".abc-reservations-pricing-link");
			const abcDeliveryPricingModal = document.querySelector(".abc-reservations-pricing-modal");

			abcDeliveryPricingLink.addEventListener("click", () => {
				abcDeliveryPricingModal.classList.add("is-active");
			});
			
			const pricingModalCloseButtons = document.querySelectorAll(".abc-pricing-modal-close");
			[...pricingModalCloseButtons].forEach(closeButton => {
				closeButton.addEventListener("click", () => {
					abcDeliveryPricingModal.classList.remove("is-active");
					closeAll();
				});
			});	
		}			
	}
	
	function closeAll() {
		resetCalendar();
		deliveryReservationForm.reset();
		deliveryReservationModal.classList.remove("is-active");
		clearNotifications();			
	}
	
	function resetCalendar() {
		calendar.destroy();
		calendar = null;
		initCalendar();
	}
	
	function clearNotifications() {
		// perform when clicking CLOSE and RESET and before form validation after clicking SUBMIT
		errorMessageListElement.innerHTML = ""; // remove errors
		errorMessageContainer.classList.add("is-hidden");
		deliveryServerErrorNotification.classList.add("is-hidden");
		deliveryFeeOptOutNotification?.classList.add("is-hidden");
	}
	
	function setupFormReset() {
		const formResetButton = document.querySelector(".abc-delivery-reservation-form-reset");
		formResetButton.addEventListener("click", () => {
			resetCalendar();
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
				axios.post("./includes/reservations/reservation.form.completion.php", reservationPayload)
					.then(response => {
						if (response.status === 200 && response.data.mail_success) {
							reservationConfirmationModal.classList.add("is-active");
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
		
		const numberOfSetsField = document.querySelector('input[name="numberOfSets"]');
		const extraChairsField = document.querySelector('input[name="extraChairs"]');
		const extraUmbrellasField = document.querySelector('input[name="extraUmbrellas"]');
		
		function coerceFormData(formDataObj) {
			const coercedData = JSON.parse(JSON.stringify(formDataObj));
			
			// sets delivery type dependent radio buttons to empty strings if not indicated
			if (coercedData.reservationType === 'DELIVERY') {
				coercedData.deliveryCity = coercedData.deliveryCity || "";
				coercedData.deliveryFeeAgreement = coercedData.deliveryFeeAgreement || ""
			}	
			
			coercedData.reservationDates = coercedData.reservationDates === "[]" ? "" : coercedData.reservationDates.split(",");
			if (coercedData.reservationDates) {
				coerceReservationDates();
			}
			
			Object.keys(coercedData).forEach(key => coercedData[key] = coercedData[key].toString().trim());
			return coercedData;
			
			function coerceReservationDates() {
				const reservationDates = coercedData.reservationDates;
				let reservationLength = coercedData.reservationLength = reservationDates.length;
                coercedData.reservationBegins = reservationDates[0];
                coercedData.reservationEnds = reservationDates[reservationLength - 1];
                delete coercedData.reservationDates;
			}
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
				
				if (reservationData.reservationType === "DELIVERY" && reservationData.numberOfSets && reservationData.numberOfSets < 2 ) {
					invalidFormData.unshift("At least 2 sets required for delivery");
				}
				
				if (reservationData.reservationType === "CONDO") { 
  				    if (!reservationData.condominium) { 
					    invalidFormData.unshift("Your condo (from the list) is required");
					}
					if (reservationData.numberOfSets && reservationData.numberOfSets < 0) {
						invalidFormData.push("Number of sets cannot be a negative value");
						numberOfSetsField.value = "";
					}
				}
				
				if (reservationData.extraChairs && reservationData.extraChairs < 0) {
					invalidFormData.push("Extra chairs cannot be a negative value");
					extraChairsField.value = "";
				}
				
				if (reservationData.extraUmbrellas && reservationData.extraUmbrellas < 0) {
					invalidFormData.push("Extra umbrellas cannot be a negative value");
					extraUmbrellasField.value = "";
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
				
				fieldLabels.set("reservationDates", "Reservation Dates");
				if (reservationData.reservationType === 'DELIVERY') {
					fieldLabels.set("deliveryFeeAgreement", "Delivery Fee Agreement (AGREE or OPT-OUT)");
				}
				
				return fieldLabels;
			}
		}
	}
});