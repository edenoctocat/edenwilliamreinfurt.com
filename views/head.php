<?
// path to config file
$config = $_SERVER["DOCUMENT_ROOT"];
$config = $config."/open-records-generator/config/config.php";
require_once($config);

// specific to this 'app'
$config_dir = $root."/config/";
require_once($config_dir."url.php");
// require_once($config_dir."request.php");

// config
$site = 'C-i-r-c-u-l-a-t-i-o-n';
$home = 'VIS 217, C-i-r-c-u-l-a-t-i-o-n';
$head = 'Fall 2020';

$db = db_connect("guest");
$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();
// $rr = new Request();

if($uu->id)
	$item = $oo->get($uu->id);
else
	$item = $oo->get(0);
$name = ltrim(strip_tags($item["name1"]), ".");
$nav = $oo->nav($uu->ids);
$show_menu = false;
if($uu->id) {
	$is_leaf = empty($oo->children_ids($uu->id));
	$internal = (substr($_SERVER['HTTP_REFERER'], 0, strlen($host)) === $host);	
	if(!$is_leaf && $internal)
		$show_menu = true;
}

?><!DOCTYPE html>
<html>
	<head>
		<title><? echo $site; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="/static/css/global.css">
		<link rel="stylesheet" href="/static/css/sf-text.css">
		<link rel="apple-touch-icon" href="/media/png/touchicon.png" />
	</head>
	<body>
		<div id="page"><?
			if(!$uu->id)
			{
			?><header id="menu" class="hidden homepage"><?
			}
			else if($show_menu)
			{
			?><header id="menu" class="visible"><?
			}
			else
			{
			?><header id="menu" class="hidden"><?
			}
				?><ul>
					<li><?
						if($uu->id)
						{
							?><a href="<? echo $host; ?>"><?= $head; ?></a><?
						}
						else { echo $head; }
					?></li>
					<ul class="nav-level"><?
				$prevd = $nav[0]['depth'];
				foreach($nav as $n)
				{
					$d = $n['depth'];
					if($d > $prevd)
					{
					?><ul class="nav-level"><?
					}
					else
					{
						for($i = 0; $i < $prevd - $d; $i++)
						{ ?></ul><? }
					}
					?><li><?
						if($n['o']['id'] != $uu->id)
						{
						?><a href="<? echo $host.$n['url']; ?>"><?
							echo htmlentities($n['o']['name1']);
						?></a><?
						}
						else
						{
						?><span><? echo htmlentities($n['o']['name1']); ?></span><?
						}
					?></li><?
					$prevd = $d;
				}
				?></ul>
				</ul>
			</header>