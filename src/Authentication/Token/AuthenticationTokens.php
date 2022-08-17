<?php

    namespace GSL\AttackPortal\Authentication\Token;

    use GSL\AttackPortal\ApiClient\ApiClient;
    use GSL\AttackPortal\Authentication\AuthenticationCredentials;

    class AuthenticationTokens {

        private static ?AuthenticationToken $Current = null;

        public static function requestToken(

            AuthenticationCredentials $Credentials

        ): AuthenticationToken {

            $ApiRequest = ApiClient::createRequest();

            $ApiRequest->request(

                'POST',
                'auth',
                [

                    'json' => [

                        'username' => $Credentials->getEmailAddress(),
                        'password' => $Credentials->getPassword()

                    ]

                ]

            );

            $CookieJar = $ApiRequest->getCookieJar();

            $token = $CookieJar->getCookieByName('Authentication')?->getValue();

            return AuthenticationToken::create( $token );

        }

        public static function getCurrent(): ?AuthenticationToken {

            return static::$Current;

        }

        public static function setCurrent( AuthenticationToken $Token ): void {

            static::$Current = $Token;

        }

    }

?>