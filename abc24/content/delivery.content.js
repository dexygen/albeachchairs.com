const abcDeliveryTabs = document.querySelector(".abc-delivery-tabs");
const abcReturnHomeLink = document.querySelector(".abc-return-home-link");

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

abcReturnHomeLink.addEventListener("click", () => {
	document.location.href = "./home.php";
});