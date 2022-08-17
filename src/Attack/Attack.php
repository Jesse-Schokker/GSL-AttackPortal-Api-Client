<?php

    namespace GSL\AttackPortal\Attack;

    class Attack {

        private string $status;
        private string $description;
        private int $duration;
        private string $ipAddress;
        private int $maxPeak;
        private int $volume;
        private int $timestampStarted;

        public function __construct(

            string $ipAddress,
            int $duration,
            int $maxPeak,
            int $volume,
            string $description,
            string $status,
            int $timestampStarted

        ) {

            $this->ipAddress = $ipAddress;
            $this->duration = $duration;
            $this->maxPeak = $maxPeak;
            $this->volume = $volume;
            $this->description = $description;
            $this->status = $status;
            $this->timestampStarted = $timestampStarted;

        }

        /**
         * @return string
         */
        public function getDescription(): string {
            return $this->description;
        }

        /**
         * @return int
         */
        public function getDuration(): int {
            return $this->duration;
        }

        /**
         * @return string
         */
        public function getIpAddress(): string {
            return $this->ipAddress;
        }

        /**
         * @return int
         */
        public function getMaxPeak(): int {
            return $this->maxPeak;
        }

        /**
         * @return int
         */
        public function getVolume(): int {
            return $this->volume;
        }

        public function getStatus(): string {

            return $this->status;

        }

        public function getTimestampStarted(): int {

            return $this->timestampStarted;

        }

        public static function create(

            string $ipAddress,
            int $duration,
            int $maxPeak,
            int $volume,
            string $description,
            string $status,
            int $timestampStarted

        ): static {

            return new static(

                $ipAddress,
                $duration,
                $maxPeak,
                $volume,
                $description,
                $status,
                $timestampStarted

            );

        }

    }

?>