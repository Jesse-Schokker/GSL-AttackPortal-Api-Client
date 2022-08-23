<?php

    require_once './initializer/Initializer.php';

    use Carbon\Carbon;
    use GSL\AttackPortal\Attack;

    $AttackCollection = Attack\Attacks::getInDateRange(

        new Carbon('2022-08-13 15:25:17'),
        new Carbon('2022-08-17 16:49:58')

    );

    foreach( $AttackCollection->getAll() as $Attack ) {

        var_dump([

            'ipAddress' => $Attack->getIpAddress(),
            'duration' => $Attack->getDuration(),
            'maxPeak' => $Attack->getMaxPeak(),
            'volume' => $Attack->getVolume(),
            'description' => $Attack->getDescription(),
            'status' => $Attack->getStatus(),
            'timestampStarted' => $Attack->getTimestampStarted()

        ]);

    }

?>