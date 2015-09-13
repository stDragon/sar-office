<?php
/*
	Sends a mail and then redirects back
*/

error_reporting( 1 );

global $callmePlugin;


header('Location: '.$redirect.'?callme_success='.$success.'&callme_error='.$error);
?>