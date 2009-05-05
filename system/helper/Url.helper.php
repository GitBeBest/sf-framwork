<?php
function site_url($uri='',$route = true)
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

function link_to($uri='',$name='link',$opt=array())
{
	foreach((array)$opt as $key => $val){
		$a_opt .= " ".$key.'="'.$val.'"';
	}
	return '<a href="'.site_url($uri).'" '.$a_opt.' >'.$name.'</a>';
}

function getFromUrl($debarUrl='',$targetUrl='')
{
	$fromUrl = $_POST['fromUrl'] ? $_POST['fromUrl'] : $_SERVER['HTTP_REFERER'];
	if($debarUrl && $targetUrl && ($debarUrl == $fromUrl)) return $targetUrl;
	else return $fromUrl;
}

function getColumnStr($subject='',$orderfield='')
{
	$result = router::get();
	$result['ordermode'] = ($result['ordermode'] == 'DESC') ? 'ASC' : 'DESC';
	$result['orderfield'] = $orderfield;
	$str  = array_shift($result);
	$str .= '/'.array_shift($result);
	foreach($result as $key => $val) $str .= '/'.$key.'/'.$val;
	return link_to($str,$subject,array('class'=>$result['ordermode']));
}