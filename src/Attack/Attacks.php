<?php

    namespace GSL\AttackPortal\Attack;

    use DateTime;
    use function _\map;
    use GSL\AttackPortal\ApiClient;
    use GSL\AttackPortal\Asset;

    class Attacks {

        public static function getInDateRange(

            DateTime $TimeStart,
            DateTime $TimeEnd,
            array $options = []

        ): AttackCollection {

            /** @var ?string $ipAddress */
            $ipAddress = $options['ipAddress'] ?? null;

            $Client = ApiClient\ApiClient::createRequest();

            $queryParameters = [

                'start' => $TimeStart->format('Y-m-d H:m:s'),
                'end' => $TimeEnd->format('Y-m-d H:m:s')

            ];

            if( $ipAddress ) {

                $queryParameters['dip'] = $ipAddress;

            }

            $Client->request(

                'GET',
                'api/get_recent_attacks',
                [

                    'query' => $queryParameters

                ]

            );

            $result = $Client->getResponse()->getAsJson();

            $serializedAttacks = $result['results'];

            return AttackCollection::create(

                map($serializedAttacks, static function( array $result ) {

                    return Attack::create(

                        $result['ip_address'],
                        $result['duration'],
                        $result['max_peak'],
                        $result['volume'],
                        $result['description'],
                        $result['status'],
                        $result['start_time'] / 1000

                    );

                })

            );

        }

        /**
         * @return Asset\TopAttackedAsset[]
         */
        public static function getTopAttackedAssetsInDateRange(

            DateTime $TimeStart,
            DateTime $TimeEnd,
            array $options = []

        ): array {

            $Client = ApiClient\ApiClient::createRequest();

            $queryParameters = [

                'start' => $TimeStart->format('Y-m-d H:m:s'),
                'end' => $TimeEnd->format('Y-m-d H:m:s')

            ];

            $Client->request(

                'GET',
                'api/get_top_attacked_ip',
                [

                    'query' => $queryParameters

                ]

            );

            $result = $Client->getResponse()->getAsJson();

            return map($result['results'], static function( array $result ): Asset\TopAttackedAsset {

                return Asset\TopAttackedAsset::create(

                    $result['ip_address'],
                    $result['attack_count']

                );

            });

        }

    }

?>