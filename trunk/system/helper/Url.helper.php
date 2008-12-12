<?php
function site_url($uri='',$route = false)
{
	$site_url = trim(config::get("base_url"),"/");
	if(config::get("index_page"))
		$site_url .= "/".config::get("index_page");
	$site_url .= "/".($route ? router::create_routes($uri) : trim($uri,"/"));
	return $site_url;
}

function site_path($uri='')
{
	return trim(config::get("base_url"),'/')."/".trim($uri,'/');
}

function base_url()
{
	return trim(config::get("base_url"),'/')."/";
}