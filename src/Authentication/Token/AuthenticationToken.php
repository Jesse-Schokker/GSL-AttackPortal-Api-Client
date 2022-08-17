<?php

    namespace GSL\AttackPortal\Authentication\Token;

    class AuthenticationToken {

        private string $token;

        public function __construct( string $token ) {

            $this->token = $token;

        }

        public function toString(): string {

            return $this->token;

        }

        public static function create( string $token ): static {

            return new static( $token );

        }

    }

?>