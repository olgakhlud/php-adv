<?php


namespace Driver;

class Bus extends Car
{

    /**
     * @var int $maxPassengerCount максимальное количество пассажиров
     */
    private int $maxPassengerCount = 25;
    /**
     * @var int $passengerCount текущее количество пассажиров
     */
    public int $passengerCount = 0;
    public function __construct(int $fuelCount)
    {
        parent::__construct($fuelCount);
        $this->maxTurnSpeed = 30;
        $this->maxSpeed = 70;
    }

    /**
     * Выключает зажигание
     * @return void
     */
    public function stop(): void
    {
        $this->findBusStop();
        parent::stop();
    }

    /**
     * Ищем астобусную остановку
     */
    private function findBusStop(): void
    {
        echo " Bus stop ";
    }

    /**
     * Добавляем пассажиров
     * @param int $countPassenger
     * @return void
     */
    public function addPassenger(int $countPassenger): void
    {
        if ($this->currentSpeed > 0) {
            echo ' Cant add passenger, bus is moving';
        } else {
            if ($this->passengerCount == $this->maxPassengerCount) {
                echo ' Cant add passenger, bus is full';
                return;
            }
            $this->passengerCount += $countPassenger;
            if ($this->passengerCount > $this->maxPassengerCount) {
                $this->passengerCount = $this->maxPassengerCount;
            }
            echo ' Count of passenger ' . $this->passengerCount;
        }
    }

    /**
     * Высаживаем пассажиров
     * @param int $countPassenger
     * @return void
     */
    public function removePassenger(int $countPassenger): void
    {
        if ($this->currentSpeed > 0) {
            echo ' Cant remove passenger, bus is moving';
        } else {
            if ($this->passengerCount == 0) {
                echo ' Cant add passenger, bus is empty';
                return;
            }
            $this->passengerCount -= $countPassenger;
            if ($this->passengerCount < 0) {
                $this->passengerCount = 0;
            }
            echo ' Count of passenger ' . $this->passengerCount;
        }
    }
}