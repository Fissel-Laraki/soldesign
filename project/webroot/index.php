<?php
/* Ce fichier se charge seulement d'inclure les fichiers necessaire au bon fonctionnement de notre application */ 

$begin = microtime(true);

define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('DS',DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));

require CORE.DS.'includes.php';

new Dispatcher();
?>
<div style="position:fixed;bottom:0;background:red;color:white;">
<?php 
echo 'Page generated in '. round(microtime(true) - $begin,5).' seconds';
?>
</div>