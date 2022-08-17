<?php

    namespace GSL\AttackPortal\Authentication;

    use GSL\AttackPortal\Authentication\Token\AuthenticationToken;

    class Authentication {

        public static function authenticate(

            AuthenticationCredentials $Credentials

        ): AuthenticationToken {

            $Token = Token\AuthenticationTokens::requestToken( $Credentials );

            Token\AuthenticationTokens::setCurrent( $Token );

            return $Token;

        }

    }

?>