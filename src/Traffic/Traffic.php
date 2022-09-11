<?php

    namespace GSL\AttackPortal\Traffic;

    use function _\map;
    use DateTime;
    use GSL\AttackPortal\ApiClient;

    class Traffic {

        /**
         * @param DateTime $TimeStart
         * @param DateTime $TimeEnd
         * @param array $options
         * @return array
         */
        public static function getInDateRange(

            DateTime $TimeStart,
            DateTime $TimeEnd,
            array $options = []

        ): array {

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
                'api/get_site_traffic',
                [

                    'query' => $queryParameters

                ]

            );

            $result = $Client->getResponse()->getAsJson();

            return map($result['results'], static function( array $result ): array {

                return [

                    'allowed' => $result[0],
                    'denied' => $result[1],
                    'timestamp' => $result[2] / 1000

                ];

            });

        }

    }

?>