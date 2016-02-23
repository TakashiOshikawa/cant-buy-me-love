<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

    'beatles/hello'  => 'beatles/hello',
    'beatles/crypt'  => 'beatles/override_crypt',

	'sound'  => 'sound/index',
);
