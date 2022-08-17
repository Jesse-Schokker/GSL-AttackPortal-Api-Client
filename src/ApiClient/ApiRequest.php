<?php

    namespace GSL\AttackPortal\ApiClient;

    use GuzzleHttp;
    use Psr\Http\Message\ResponseInterface;
    use GSL\AttackPortal\Authentication;

    class ApiRequest {

        private GuzzleHttp\Client $Client;
        private ?ResponseInterface $GuzzleResponse = null;
        private ?GuzzleHttp\Cookie\CookieJar $CookieJar = null;
        private ?Authentication\Token\AuthenticationToken $AuthenticationToken = null;

        public function __construct( GuzzleHttp\Client $Client ) {

            $this->Client = $Client;

            $CurrentAuthenticationToken = Authentication\Token\AuthenticationTokens::getCurrent();

            if( $CurrentAuthenticationToken ) {

                $this->setAuthenticationToken( $CurrentAuthenticationToken );

            }

        }

        public function getAuthenticationToken(): ?Authentication\Token\AuthenticationToken {

            return $this->AuthenticationToken;

        }

        public function setAuthenticationToken( Authentication\Token\AuthenticationToken $Token ): void {

            $this->AuthenticationToken = $Token;

        }

        public function request(

            string $method,
            string $uri,
            array $requestOptions

        ): void {

            $CookieJar = $this->getCookieJar();

            $AuthenticationToken = $this->getAuthenticationToken();

            if( $AuthenticationToken ) {

                $CookieJar->setCookie(

                    new GuzzleHttp\Cookie\SetCookie([

                        'Domain' => 'protection.portal.globalsecurelayer.com',
                        'Name' => 'Authentication',
                        'Value' => $AuthenticationToken->toString(),
                        'Discard' => true

                    ])

                );

            }

            $requestOptions['cookies'] = $CookieJar;

            $this->GuzzleResponse = $this->Client->request(

                $method,
                $uri,
                $requestOptions

            );

        }

        public function getResponse(): ApiResponse {

            return new ApiResponse( $this->GuzzleResponse );

        }

        public function getCookieJar(): GuzzleHttp\Cookie\CookieJar {

            return $this->CookieJar ?? $this->CookieJar = $this->createCookieJar();

        }

        private function createCookieJar(): GuzzleHttp\Cookie\CookieJar {

            return new GuzzleHttp\Cookie\CookieJar();

        }

    }

?>