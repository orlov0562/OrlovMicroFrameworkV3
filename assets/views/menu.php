<?php
    $route = $this->mi->registry->route->name;
?>
<a href="<?=$this->mi->url->base()?>" style="<?=$route=='home'?'font-weight:bold;':''?>">Home</a>  |
<a href="<?=$this->mi->url->base('404')?>" style="<?=$route=='err404'?'font-weight:bold;':''?>">Error 404</a>
<hr/>