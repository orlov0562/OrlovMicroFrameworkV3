<h1>Home</h1>

Current route:<br>
<pre>
<?php
    print_r($this->mi->registry->route);
?>
</pre>

<hr>
Current request:<br>
<pre>
<?php
    print_r($this->mi->request->get());
?>
</pre>

<hr>
Url Base path: <?=$this->mi->url->base('home');?><br>
Url Absolute path: <?=$this->mi->url->absolute('home');?><br>

