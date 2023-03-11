<?php
    $abcPropertiesByCity = array(
        "Orange Beach" => array(
            array("name" => "Phoenix VII", "imgSrcPath" => "./assets/images/properties/phoenix-vii-small.png"),
            array("name" => "Hammock Dunes", "imgSrcPath" => "./assets/images/properties/hammock-dunes.jpg")
        ),
        "Gulf Shores" => array(
            array("name" => "Whaler Condiminiums", "imgSrcPath" => "./assets/images/properties/whaler.png"),
            array("name" => "Gulf House Condiminiums", "imgSrcPath" => "./assets/images/properties/gulf-house.png")		
        )
    );

    $abcPropertiesAll = array_merge($abcPropertiesByCity["Orange Beach"], $abcPropertiesByCity["Gulf Shores"]);
    $abcPropertyNames = array_column($abcPropertiesAll, "name");