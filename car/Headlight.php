<?php


namespace Driver;


class Headlight
{
    public string $light;
    public string $turnLight;

    /**
     * Включает фару
     * @return void
     */
    public function turnOn(): void
    {
        $this->light = 'on';
    }

    /**
     * Включает фару
     * @return void
     */
    public function turnOff(): void
    {
        $this->light = 'off';
    }

    /**
     * Включает поворотник
     * @return void
     */
    public function turnSignalOn(): void
    {
        $this->turnLight = 'on';
    }

    /**
     * Выключает поворотник
     * @return void
     */
    public function turnSignalOff(): void
    {
        $this->turnLight = 'off';
    }
}