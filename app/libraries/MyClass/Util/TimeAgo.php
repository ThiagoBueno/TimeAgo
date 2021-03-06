<?php
namespace MyClass\Util;

class TimeAgo{

  	public static function rDate($date){

    		if(empty($date)) {

			return "No date provided";

		}

		$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

		$lengths = array("60","60","24","7","4.35","12","10");

		$now = time();

		$unix_date = strtotime($date);

		//Check validity of date
		if(empty($unix_date)) {

			return "invalid date";

		}
		
		//is it future date or past date
		if($now > $unix_date) {

			$difference = $now - $unix_date;
			$tense = "ago";

		}else{

			$difference = $unix_date - $now;
			$tense = "now";
		}

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {

			$difference /= $lengths[$j];
			
		}

		$difference = round($difference);

		if($difference != 1) {

			$periods[$j].= "s";

		}

		return "$difference $periods[$j] {$tense}";

	}
}
