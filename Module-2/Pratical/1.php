<?php

	$followerCount = 7500;

	if ($followerCount < 1000) 
	{
		$tier = "Newbie";
	} 
	elseif ($followerCount <= 10000) 
	{
		$tier = "Rising Star";
	} else 
	{
		$tier = "Influencer";
	}

	echo "Follower Count: " . $followerCount . "<br>";
	echo "Tier: " . $tier;

?>