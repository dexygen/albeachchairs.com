const abcReseverationFormLink = document.querySelector(".abc-reservation-form-link");
const abcReservationModal = document.querySelector(".abc-reservation-modal");

let modalCloseClickHandlersAdded;
{	
	abcReseverationFormLink.addEventListener("click", () => {
		abcReservationModal.classList.add("is-active");
		if (!modalCloseClickHandlersAdded) {
			// ensure close button handlers set just once because below initialized above block scope
			modalCloseClickHandlersAdded = true;
			
			const modalCloseButtons = document.querySelectorAll(".abc-reservation-modal-close");
			[...modalCloseButtons].forEach(closeButton => {
				closeButton.addEventListener("click", () => {
					abcReservationModal.classList.remove("is-active");
				});
			});
		}
	});  
}

const abcReturnHomeLink = document.querySelector(".abc-return-home-link");
abcReturnHomeLink.addEventListener("click", () => {
	document.location.href = "./home.php";
});

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