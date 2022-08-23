<?php

    namespace GSL\AttackPortal\Asset;

    class TopAttackedAsset {

        private string $address;
        private int $attackCount;

        public function __construct( string $address, int $attackCount ) {

            $this->address = $address;
            $this->attackCount = $attackCount;

        }

        public function getAddress(): string {

            return $this->address;

        }

        public function getAttackCount(): int {

            return $this->attackCount;

        }

        public static function create(

            string $address,
            int $attackCount

        ): static {

            return new static(

                $address,
                $attackCount

            );

        }

    }

?>