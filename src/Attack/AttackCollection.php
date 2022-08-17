<?php

    namespace GSL\AttackPortal\Attack;

    class AttackCollection {

        /**
         * @var Attack[]
         */
        private array $attacks;

        /**
         * @param Attack[] $attacks
         */
        public function __construct( array $attacks ) {

            $this->attacks = $attacks;

        }

        public function getAll(): array {

            return $this->attacks;

        }

        /**
         * @param Attack[] $attacks
         * @return static
         */
        public static function create( array $attacks ): static {

            return new static(

                $attacks

            );

        }

    }

?>