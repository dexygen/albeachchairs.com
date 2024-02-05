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
		setupModalWithPricingAndCloseButtons();
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
		
		function setupModalWithPricingAndCloseButtons() {
			const deliveryReservationLink = document.querySelector(".abc-delivery-reservation-link");
			const deliveryReservationModal = document.querySelector(".abc-delivery-reservation-modal");
			
			deliveryReservationLink.addEventListener("click", () => {
				deliveryReservationModal.classList.add("is-active");		
			});
			
			const reservationModalCloseButtons = document.querySelectorAll(".abc-delivery-reservation-modal-close");
			[...reservationModalCloseButtons].forEach(closeButton => {
				closeButton.addEventListener("click", () => {
					deliveryReservationForm.reset();
					deliveryReservationModal.classList.remove("is-active");
				});
			});

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
		
		function setupFormReset() {
			const formResetButton = document.querySelector(".abc-delivery-reservation-form-reset");
			formResetButton.addEventListener("click", () => {
				deliveryReservationForm.reset();
			});
		}
		
		function setupFormSubmit() {
			const formSubmitButton = document.querySelector(".abc-delivery-reservation-form-submit");
            formSubmitButton.addEventListener("click", () => {
				const formDataObj = Object.fromEntries(new FormData(deliveryReservationForm));
				const reservationData = coerceReservationValues(formDataObj);
			});
			
			function coerceReservationValues(formDataObj) {
				formDataObj.deliveryCity = formDataObj.deliveryCity || "";
				formDataObj.reservationDates = formDataObj.reservationDates === "[]" ? "" : formDataObj.reservationDates;
				Object.keys(formDataObj).forEach(key => formDataObj[key] = formDataObj[key].trim());
				return JSON.stringify(formDataObj);
			}
		}
	}
})();