<?php

    require_once __DIR__ . '/../../vendor/autoload.php';

    use GSL\AttackPortal\Authentication;

    $emailAddress = $argv[1];
    $password = $argv[2];

    Authentication\Authentication::authenticate(

        Authentication\AuthenticationCredentials::create(

            $emailAddress,
            $password

        )

    );

?>