<?php

    require_once './initializer/Initializer.php';

    use Carbon\Carbon;
    use GSL\AttackPortal\Traffic;

    $results = Traffic\Traffic::getInDateRange(

        new Carbon('2022-08-13 15:25:17'),
        new Carbon('2022-08-17 16:49:58')

    );

    $peakAllowed = 0;
    $peakDenied = 0;

    foreach( $results as $result ) {

        $allowed = $result['allowed'];
        $denied = $result['denied'];

        if( $allowed > $peakAllowed ) {

            $peakAllowed = $allowed;

        }

        if( $denied > $peakDenied ) {

            $peakDenied = $denied;

        }

    }

    var_dump([

        'allowedDenied' => $peakAllowed,
        'peakDenied' => $peakDenied,

    ]);

?>