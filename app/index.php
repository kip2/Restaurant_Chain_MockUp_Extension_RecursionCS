<?php
spl_autoload_extensions(".php");
spl_autoload_register();

require_once 'vendor/autload.php';

    
header('Location: view/generate.php');

    exit();
?>