<?php

    namespace GSL\AttackPortal\Authentication\Token;

    use GSL\AttackPortal\ApiClient\ApiClient;

    class AuthenticationToken {

        private string $token;

        public function __construct( string $token ) {

            $this->token = $token;

        }

        public function refresh(): void {

            $ApiRequest = ApiClient::createRequest();

            $ApiRequest->setAuthenticationToken( $this );

            $ApiRequest->request(

                'GET',
                'refresh'

            );

        }

        public function toString(): string {

            return $this->token;

        }

        public static function create( string $token ): static {

            return new static( $token );

        }

    }

?>