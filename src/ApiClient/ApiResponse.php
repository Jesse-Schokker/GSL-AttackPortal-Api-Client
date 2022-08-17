<?php

    namespace GSL\AttackPortal\ApiClient;

    use Psr\Http\Message\ResponseInterface;

    class ApiResponse {

        private ResponseInterface $GuzzleResponse;

        public function __construct( ResponseInterface $GuzzleResponse ) {

            $this->GuzzleResponse = $GuzzleResponse;

        }

        public function getRaw(): ResponseInterface {

            return $this->GuzzleResponse;

        }

        public function getAsJson(): mixed {

            return json_decode( $this->getAsString(), true );

        }

        public function getAsString(): string {

            return (string)$this->getRaw()->getBody();

        }

    }

?>