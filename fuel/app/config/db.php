<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
    'default' => array(
        'connection'  => array(
            'dsn'        => 'mysql:host=joins-mysql;dbname=cant_buy_me_love',
            'username'   => 'root',
            'password'   => 'root',
        ),
        'profiling'  => true,
    ),
);
