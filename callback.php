<?php
include './simple_html_dom.php';
$url = $_GET['url'];
$url_e = explode("/",$url);
if($url_e[2]=="www.ted.com" || $url_e[0]=="www.ted.com"){
	if($url_e[0]=="www.ted.com")
		$url = "http://".$url;
	$web = file_get_html($url);
	if($web==null)
		exit("invalid");
	$content = $web->find('#share_and_save');
	$filmID= $content[0]->attr['data-id'];
	if(!is_numeric($filmID)){
		echo "invalid";
	}else{
		$subtitleJSON = file_get_contents("http://www.ted.com/talks/subtitles/id/$filmID/lang/en");
		echo $subtitleJSON;
	}
}
else{
	echo("invalid");
}
?>