<?php


namespace Driver;


use Driver\MovableInterface;

class Car implements MovableInterface
{
    private const TURN_DIRECTIONS = ['right', 'left'];
    /**
     * @var object двигатель
     */
    private object $engine;
    /**
     * @var object фары
     */
    private object $headlight;

    /**
     * @var bool Статус работы двигателя
     */
    protected bool $engineWorking;
    /**
     * @var int максимальная скорость
     */
    protected int $maxSpeed = 100;
    /**
     * @var int текущая скорость
     */
    protected int $currentSpeed = 0;
    /**
     * @var int максимальная скорость при повороте
     */
    protected int $maxTurnSpeed = 40;

    public function __construct(int $fuelCount)
    {
        $this->engine = new Engine($fuelCount);
        $this->headlight = new Headlight();
        echo 'Have a nice trip';

    }

    /**
     * Включает зажигание
     * @return void
     */
    public function start(): void
    {
        $this->engineWorking = $this->engine->startEngine($this->headlight);
    }

    /**
     * Выключает зажигание
     * @return void
     */
    public function stop(): void
    {
        $this->currentSpeed = 0;
        $this->engineWorking = $this->engine->finishEngine($this->headlight);
    }

    /**
     * Увеличивает скорость движения
     * @return void
     */
    public function up(int $speed): void
    {
        if ($this->checkEngine()) {
            $this->currentSpeed += $speed;
            if ($this->currentSpeed > $this->maxSpeed) {
                $this->currentSpeed = $this->maxSpeed;
            }
            echo ' Your speed is ' . $this->currentSpeed;
        }
    }

    /**
     * Уменьшает скорость движения
     * @return void
     */
    public function down(int $speed): void
    {
        if ($this->checkEngine()) {
            $this->currentSpeed -= $speed;
            if ($this->currentSpeed > 0) {
                echo ' Your speed is ' . $this->currentSpeed;
            } else { // заглохли
                $this->currentSpeed = 0;
                $this->stop();
                echo ' Oops, too fast braking';
            }

        }
    }

    /**
     * Поворачиваем
     * @param string $direction - right, left
     * @return void
     */
    public function turn(string $direction): void
    {
        if ($this->checkEngine()) {
            if ($this->currentSpeed == 0) {
                echo ' Your need to up speed ';
                return;
            }
            if (!in_array($direction, Car::TURN_DIRECTIONS)) {
                echo ' You can turn right or left ';
                return;
            }

            $speedDif = $this->doBeforeTurn();
            echo " Turning " . $direction;
            $this->doAfterTurn($speedDif);
        }

    }

    /**
     * Выполняем необходимые перед поворотом действия
     * @return int
     */
    private function doBeforeTurn(): int
    {
        $needToDown = 0;
        // сбрасываем скорость перед поворотом
        if ($this->currentSpeed > $this->maxTurnSpeed)  {
            $needToDown = $this->currentSpeed - $this->maxTurnSpeed;
            $this->down($needToDown);
        }
        // включаем поворотник
        $this->headlight->turnSignalOn();
        echo " Your turnLight is " . $this->headlight->turnLight;

        return $needToDown;
    }

    /**
     * Выполняем необбходимые после поворотоа действия
     * @param $speedDif - разница между текущей скоростью и скоростью до поворота
     * @return int
     */
    private function doAfterTurn(int $speedDif): void
    {
        // выключаем поворотник
        $this->headlight->turnSignalOff();
        echo " Your turnLight is " . $this->headlight->turnLight;
        // набираем скорость которая была до поворта
        $this->up($speedDif);
    }

    /**
     * Пороверяем работает ли двигатель
     * @return bool
     */
    protected function checkEngine(): bool
    {
        if (!$this->engineWorking) {
            echo ' Your are not moving ';
        }

        return $this->engineWorking;
    }
}
