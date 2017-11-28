<?php
function __autoload($file_name){
	include_once('models/user/'.$file_name.'.php');
}
?>