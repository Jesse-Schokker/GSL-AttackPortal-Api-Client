<?php

    require_once '../vendor/autoload.php';

    use Carbon\Carbon;
    use GSL\AttackPortal\Authentication;
    use GSL\AttackPortal\Attack;

    $emailAddress = $argv[1];
    $password = $argv[2];

    Authentication\Authentication::authenticate(

        Authentication\AuthenticationCredentials::create(

            $emailAddress,
            $password

        )

    );

    $AttackCollection = Attack\Attacks::getInDateRange(

        new Carbon('2022-08-01 15:25:17'),
        new Carbon('2022-08-17 16:49:58')

    );

    foreach( $AttackCollection->getAll() as $Attack ) {

        var_dump([

            'ipAddress' => $Attack->getIpAddress(),
            'duration' => $Attack->getDuration(),
            'maxPeak' => $Attack->getMaxPeak(),
            'volume' => $Attack->getVolume(),
            'description' => $Attack->getDescription(),
            'status' => $Attack->getStatus()

        ]);

    }

?>