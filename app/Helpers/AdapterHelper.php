<?php  

	function parsePageURL($uri)
	{
		$domain = env("DOMAIN_MAIN");
		return $domain."/".$uri;
	}
	function getAppURL()
	{
		return env("APP_URL");
	}
	function arrayToList($array = [])
	{
		$li = "<ul>";
		foreach ($array as $row) {
		    $li.="<li>".$row->name."</li>";
		}
		$li.="</ul>";
		return $li;
	}