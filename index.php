<?php
include'vendor/autoload.php';
use Ngin\Handler\Start;

new Start->getPage("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
?>