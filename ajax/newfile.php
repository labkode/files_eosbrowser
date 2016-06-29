<?php 

OCP\JSON::checkLoggedIn();
\OC::$server->getSession()->close();

$instance = isset($_POST['instance'])? $_POST['instance'] : false;

if($instance)
{
	\OC\Cernbox\Storage\EosInstanceManager::setUserInstance($instance);
}
else
{
	OC_JSON::error(['data' => ['message' => 'An error occured. Please, reload your browser']]);
	exit();
}

require '/var/www/html/cernbox/apps/files/ajax/newfile.php';