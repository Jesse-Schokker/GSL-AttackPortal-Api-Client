<?php

    namespace GSL\AttackPortal\Authentication;

    class AuthenticationCredentials {

        private string $emailAddress;
        private string $password;

        public function __construct( string $emailAddress, string $password ) {

            $this->emailAddress = $emailAddress;
            $this->password = $password;

        }

        public function getEmailAddress(): string {

            return $this->emailAddress;

        }

        public function getPassword(): string {

            return $this->password;

        }

        public static function create( string $emailAddress, string $password ): static {

            return new static(

                $emailAddress,
                $password

            );

        }

    }

?>