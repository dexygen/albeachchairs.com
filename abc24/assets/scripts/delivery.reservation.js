const abcDeliveryPricingLink = document.querySelector(".abc-delivery-pricing-link");
const abcDeliveryPricingModal = document.querySelector(".abc-delivery-pricing-modal");

let pricingModalCloseClickHandlersAdded;
{	
	abcDeliveryPricingLink.addEventListener("click", () => {
		abcDeliveryPricingModal.classList.add("is-active");
		if (!pricingModalCloseClickHandlersAdded) {
			// ensure close button handlers set just once because below initialized above block scope
			pricingModalCloseClickHandlersAdded = true;
			
			const modalCloseButtons = document.querySelectorAll(".abc-pricing-modal-close");
			[...modalCloseButtons].forEach(closeButton => {
				closeButton.addEventListener("click", () => {
					abcDeliveryPricingModal.classList.remove("is-active");
				});
			});
		}
	});  
}

// isn't the content loaded because script is below markup?
document.addEventListener('DOMContentLoaded', () => {
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
			  // console.log(calendar.selectedDates);
			},
		  },
	});
	calendar.init();
});