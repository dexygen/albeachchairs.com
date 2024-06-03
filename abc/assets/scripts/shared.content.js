const abcReturnHomeLink = document.querySelector(".abc-return-home-link");
	abcReturnHomeLink.addEventListener("click", () => {
	document.location.href = "./index.php";
});

function setupInfoTabs(tabsSource) {
	const tabClassPrefix = ".abc-" + tabsSource + "-info-"
	const infoTabs = document.querySelector(tabClassPrefix + "tabs");
	[...infoTabs.querySelectorAll("li")].forEach(tab => {
		tab.addEventListener("click", () => {
			let activeTab = infoTabs.querySelector("li.is-active");
			let inactiveTab = infoTabs.querySelector("li:not(.is-active)");
			
			if (tab !== activeTab) {			
				activeTab.classList.remove("is-active");
				activeTab.querySelector("a").classList.add("has-background-light");
				
				inactiveTab.classList.add("is-active");
				inactiveTab.querySelector("a").classList.remove("has-background-light");

                const sectionSelector = tabClassPrefix + "sections";
				let visibleInfoSection = document.querySelector(sectionSelector + " > section:not(.is-hidden)");
				let hiddenInfoSection = document.querySelector(sectionSelector + " > section.is-hidden")
				
				visibleInfoSection.classList.add("is-hidden");
				hiddenInfoSection.classList.remove("is-hidden");
			}
		});
	});
}