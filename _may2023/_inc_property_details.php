<?php
    $abcPropertyDetailsByCity = array(
        "Orange Beach" => array(
            array(
                "name" => "Phoenix VII", 
                "imgSrcPath" => "./assets/images/properties/phoenix-vii-small.png"
            ),
            array(
                "name" => "Windward Pointe Condiminiums", 
                "imgSrcPath" => "./assets/images/properties/summer-salt-east.png"
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
                "imgSrcPath" => "./assets/images/properties/gulf-house.png"
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