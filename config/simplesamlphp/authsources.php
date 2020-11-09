<?php

$config = array(

    'admin' => array(
        'core:AdminPassword',
    ),

    'example-userpass' => array(
        'exampleauth:UserPass',
        'user1:user1pass' => array(
            'email' => 'user1@example.com',
            'first_name' => 'Roo',
            'family_name' => 'Sato',
        ),
        'user2:user2pass' => array(
            'email' => 'user2@example.com',
            'first_name' => 'Java',
            'family_name' => 'Mutt',
        ),
    ),

);
