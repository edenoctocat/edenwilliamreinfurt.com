<?
/*
    site-specific config
*/

$site_title = 'edenwilliamreinfurt';
$head = 'eden';
$site = '!';
$home = $head . ", " . $site;
$card_default = '/media/jpg/card-default.jpg';
$description = 'eden!';
$site_url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
$site_url .= '://' . $_SERVER['SERVER_NAME'];
?>
