<?php

    namespace GSL\AttackPortal\Attack;

    enum AttackStatus {

        case Started;
        case Ended;
        case OnGoing;

        public static function fromString( string $value ): ?AttackStatus {

            if( $value === 'ongoing' ) {

                return self::OnGoing;

            }

            if( $value === 'start' ) {

                return self::Started;

            }

            if( $value === 'end' ) {

                return self::Ended;

            }

            return null;

        }

    }

?>