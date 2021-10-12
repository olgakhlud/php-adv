<?php


namespace Driver;


class Engine
{
    private bool $hasFuel = false;

    public function __construct(int $fuelCount)
    {
        if ($this->checkFuel($fuelCount)) {
            $this->hasFuel = true;
        }
    }

    /**
     * Начало работы двигателя
     * @return bool
     */
    public function startEngine(Headlight $headlight): bool
    {
        $started = false;
        if ($this->hasFuel) {
            $started = true;
            echo ' Engine is started! ';
            $headlight->turnOn();
            echo ' Your headlight is ' . $headlight->light;
        }

        return $started;
    }

    /**
     * Конец работы двигателя
     * @return bool
     */
    public function finishEngine(Headlight $headlight): bool
    {
        $headlight->turnOff();
        echo ' Your headlight is ' . $headlight->light;
        echo ' Engine is finished! ';

        return false;
    }

        /**
     * Проверяем есть ли топливо
     * @param int $fuelCount
     * @return bool
     */
    private function checkFuel(int $fuelCount): bool
    {
        $result = false;
        if ($fuelCount > 0) {
            $result = true;
        } else {
            echo ' You need to refuel ';
        }

        return $result;
    }
}