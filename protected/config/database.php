<?php
// This is the database connection configuration.
return array(
	'connectionString' => 'mysql:host=localhost;dbname=clinic',
    'class'=>'application.extensions.PHPPDO.CPdoDbConnection',
    'pdoClass' => 'PHPPDO',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	
);
?>