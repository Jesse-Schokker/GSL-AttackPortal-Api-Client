<?php

    namespace GSL\AttackPortal\ApiClient;

    use GuzzleHttp;

    class ApiClient {

        private static ?GuzzleHttp\Client $DefaultGuzzleClient = null;

        public static function createRequest(

            array $options = []

        ): ApiRequest {

            $Client = $options['client'] ?? static::acquireDefaultGuzzleClient();

            return new ApiRequest( $Client );

        }

        public static function acquireDefaultGuzzleClient(): GuzzleHttp\Client {

            return static::$DefaultGuzzleClient ?? static::$DefaultGuzzleClient = (

                new GuzzleHttp\Client([

                    'base_uri' => 'https://protection.portal.globalsecurelayer.com',
                    'cookies' => true,
                    'verify' => false

                ])

            );

        }

    }

?>