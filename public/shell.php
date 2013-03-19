<?php
$cmd = 'arp -a';
echo "<pre>".shell_exec($cmd)."</pre>";
?>