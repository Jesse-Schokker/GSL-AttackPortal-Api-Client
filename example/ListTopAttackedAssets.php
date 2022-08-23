<?php

    require_once './initializer/Initializer.php';

    use function _\map;
    use Carbon\Carbon;
    use GSL\AttackPortal\Attack;
    use GSL\AttackPortal\Asset;

    var_dump(

        map(

            Attack\Attacks::getTopAttackedAssetsInDateRange(

                new Carbon('2022-08-13 15:25:17'),
                new Carbon('2022-08-17 16:49:58')

            ),
            static function( Asset\TopAttackedAsset $Asset ) {

                return [

                    'address' => $Asset->getAddress(),
                    'count' => $Asset->getAttackCount()

                ];

            }

        )

    );

?>