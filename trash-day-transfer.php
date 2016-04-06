<?php

// Set the default time zone to LA.
date_default_timezone_set('America/Los_Angeles');

// URL strings used in lookups (Note - API key needed for phone number lookup).
define('PHONE_LOOKUP_API', 'https://proapi.whitepages.com/2.2/phone.json?phone_number=%phone_number%&api_key={your-api-key}');
define('TRASH_DAY_LOOKUP_API', 'http://maps.lacity.org/lahub/rest/services/Boundaries/MapServer/22/query?outFields=Day&geometryType=esriGeometryPoint&returnGeometry=false&geometry=%geometry%&inSR=4326&f=json');

// The phone number prefix to check on inbound calls.
define('PREFIX', '213');

// The number to send callers to after lookup.
define('TRANSFER_NUMBER', 'tel:+12134733231');

// Simple array to convert names of days to integers.
$daysOfWeek = array();
$daysOfWeek['Sunday'] = 0;
$daysOfWeek['Monday'] = 1;
$daysOfWeek['Tuesday'] = 2;
$daysOfWeek['Wednesday'] = 3;
$daysOfWeek['Thursday'] = 4;
$daysOfWeek['Friday'] = 5;
$daysOfWeek['Saturday'] = 6;

// Check to see if caller is in Los Angeles
function checkAreaCode($callerID) {
	if(substr($callerID,0,3 == PREFIX) {
		return true;
	}
	return false;
}

// White pages lookup for caller.
function getPhoneData($callerID) {
	$url = str_replace('%phone_number%', $callerID, PHONE_LOOKUP_API);
	return json_encode(file_get_contents($url));
}

// Trash day lookup for caller.
function lookUpTrashDay($geometry) {
	$url = str_replace('%geometry%', $geometry, TRASH_DAY_LOOKUP_API);
	return json_encode(file_get_contents($url));
}

// Get the current day.
function getCurrentDay() {
	return date('l', time());
}

// Get the caller ID of the current caller.
$callerID = $currentCall->callerID

// Check to ensure the caller is in LA.
if(checkAreaCode($callerID)) {
	$phoneData = getPhoneData($callerID);

	// Ensure phone number lookup is successful.
	if($phoneData->results[0]->is_valid) {
		$coordinates = $phoneData->results[0]->belongs_to[0]->locations[0]->lat_long;
		$trashDayData = lookUpTrashDay($coordinates->longitude . ',' . $coordinates->latitude);
		$trashDay = $trashDayData->features[0]->attributes->Day
		$offset = ($daysOfWeek[$trashDay] - getCurrentDay());

		// If current day is within 2 days of trash day, prompt caller appropriately.
		if(3 > $offset && $offset >= 0) {
			if($offset == 0) {
				say('Today is your trash pick up day, please remember to take out your trash.');
			}
			else {
				say('Your trash pick up day is ' . $trashDay . ', please remember to take out your trash.');
			}
		}
	}
}

// Transfer to LA 311.
transfer(TRANSFER_NUMBER);

