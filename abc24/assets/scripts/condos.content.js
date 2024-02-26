{
	setupCondosTabs();
	
	const abcReturnHomeLink = document.querySelector(".abc-return-home-link");
	abcReturnHomeLink.addEventListener("click", () => {
		document.location.href = "./home.php";
	});
	
	function setupCondosTabs() {
		const abcCondosInfoTabs = document.querySelector(".abc-condo-info-tabs");
		[...abcCondosInfoTabs.querySelectorAll("li")].forEach(tab => {
			tab.addEventListener("click", () => {
				let activeTab = abcCondosInfoTabs.querySelector("li.is-active");
				let inactiveTab = abcCondosInfoTabs.querySelector("li:not(.is-active)");
				
				if (tab !== activeTab) {			
					activeTab.classList.remove("is-active");
					activeTab.querySelector("a").classList.add("has-background-light");
					
					inactiveTab.classList.add("is-active");
					inactiveTab.querySelector("a").classList.remove("has-background-light");

					let visibleInfoSection = document.querySelector(".abc-condos-info-sections > section:not(.is-hidden)");
					let hiddenInfoSection = document.querySelector(".abc-condos-info-sections > section.is-hidden")
					
					visibleInfoSection.classList.add("is-hidden");
					hiddenInfoSection.classList.remove("is-hidden");
				}
			});
		});
	}
}