<?php

  $ua = $_SERVER['HTTP_USER_AGENT'];
  $isPhone = stripos($ua, 'Android') || stripos($ua, 'iPhone');
  
	$abcPropertyDetailsByCity = array(
		"Orange Beach" => array(
			array(
				"name" => "Phoenix VII", 
				"imgSrcPath" => "./assets/images/properties/phoenix-vii-small.png"
			),
			array(
				"name" => "Windward Pointe Condiminiums", 
				"imgSrcPath" => "./assets/images/properties/windward.jpg"
			),
			array(
				"name" => "Shoalwater", 
				"imgSrcPath" => "./assets/images/properties/windward.jpg"
			),
			array(
				"name" => "Seascape Condiminiums", 
				"imgSrcPath" => "./assets/images/properties/seascape.PNG"
			),
			array(
				"name" => "Hammock Dunes", 
				"imgSrcPath" => "./assets/images/properties/hammock-dunes.jpg"
			),
			array(
				"name" => "Romar Beach Bed and Breakfast", 
				"imgSrcPath" => "./assets/images/properties/romar-house.PNG"
			),
			array(
				"name" => "Summer Salt East", 
				"imgSrcPath" => "./assets/images/properties/summer-salt-east.png"
			)
		),
		"Gulf Shores" => array(
			array(
				"name" => "Whaler Condiminiums", 
				"imgSrcPath" => "./assets/images/properties/whaler.png"
			),
			array(
				"name" => "Gulf House Condiminiums", 
				"imgSrcPath" => "./assets/images/properties/gulf-house.png"
			)		
		)
	);

	$abcPropertiesAll = array_merge(
		$abcPropertyDetailsByCity["Orange Beach"], 
		$abcPropertyDetailsByCity["Gulf Shores"]
	);
	$abcPropertyNamesAll = array_column($abcPropertiesAll, "name");
	
    const ABC_RESERVATION_TYPE_DELIVERY = "DELIVERY";
	const ABC_RESERVATION_TYPE_CONDO = "CONDO";