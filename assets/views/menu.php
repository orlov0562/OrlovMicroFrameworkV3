<?php
    $route = $this->mi->registry->route->name;
?>
<a href="<?=$this->mi->url->absolute('')?>" style="<?=$route=='home'?'font-weight:bold;':''?>">Home</a>  |
<a href="<?=$this->mi->url->absolute('/404')?>" style="<?=$route=='err404'?'font-weight:bold;':''?>">Error 404</a>
<hr/>