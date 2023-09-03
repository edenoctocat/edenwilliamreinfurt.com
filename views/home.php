<?
$children = $oo->children(0);
shuffle($children);
$urls = [];
$imgs = [];
foreach ($children as $child) {
        $media = $oo->media($child['id']);
        foreach ($media as $m) {
                $imgs[] = m_url($m);
		$urls[] = $child['url'];
		break;
        }
}

?><div id='fullwindow'></div>
<section id="main">
	<div id="breadcrumbs">
		<ul class="nav-level">
			<li><?
				if(!$uu->id) {
                    echo $home . '<a href="/about">&thinsp;*&nbsp;</a>';
				} else {
				    ?><a href="/<?= $a_url; ?>"><?= $head; ?></a><?
				}
			?></li>
			<ul class="nav-level">
				<span><? echo $name; ?></span>
			</ul>
		</ul>
	</div>
    <div id='content'>
        <div id='columns'><?
            $j = 0;
	    foreach ($imgs as $i) {
		?><div class = 'img-box'>
			<a href='<?= $urls[$j]; ?>'>
			    <img src='<?= $i; ?>'>
			</a>
		</div><?
                $j++;
            }
        ?></div>
    </div>
</section>
