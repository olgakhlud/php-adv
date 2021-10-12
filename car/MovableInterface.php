<?php


namespace Driver;


interface MovableInterface
{
  /**
   * Включает зажигание
   * @return mixed
   */
  public function start();

  /**
   * Выключает зажигание
   * @return mixed
   */
  public function stop();

  /**
   * Увеличивает скорость движения
   * @return mixed
   */
  public function up(int $speed);

  /**
   * Уменьшает скорость движения
   * @return mixed
   */
  public function down(int $speed);
}
