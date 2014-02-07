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
Url Absolute path:<br>
<pre>
<?php
    print_r($this->mi->url->absolute('/'));
?>
</pre>
