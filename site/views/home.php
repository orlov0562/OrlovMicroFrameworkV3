<h2>Home</h2>

Current route:<br>
<pre>
<?php
    print_r($this->mi->registry->route);
?>
</pre>
<hr>
Current callback:<br>
<pre>
<?php
    print_r($this->mi->registry->callback);
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
App Dir base path: <?=$this->mi->path->base();?><br>
Url Base path: <?=$this->mi->url->base('home');?><br>
Url Absolute path: <?=$this->mi->url->absolute('home');?><br>

