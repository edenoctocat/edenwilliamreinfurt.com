<?
/*
    site-specific config
*/

$site_title = 'edenwilliamreinfurt';
$head = 'eden reinfurt is a high school senior in new york city.';
$site = '';
$home = $head . ", " . $site;
$card_default = '/media/jpg/card-default.jpg';
$description = 'eden reinfurt is a high school senior in new york city.';
$site_url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
$site_url .= '://' . $_SERVER['SERVER_NAME'];
?>
