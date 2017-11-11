<?php

Config::set('site_name','MyMVC');

Config::set('routes',array(
	'default' => '',
	'admin' => 'admin',
));

Config::set('default_route','default');

Config::set('default_controller','users');

Config::set('default_action','index');

Config::set('db.host','localhost');

Config::set('db.user','root');

Config::set('db.password','ms2525');

Config::set('db.db_name','db_mymvc');

//Config::set('salt','123456');

?>
