<?php
$tab = array("one", "two", "three") ;
$a = "tab" ;
$$a[] ="four" ; // <==== fatal error
var_dump($tab) ;
?>