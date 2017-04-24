<?php

abstract class Observer implements SplObserver
{
  private $observable;

  function __construct(Observable $observable)
  {
    $this->observable = $observable;
    $observable->attach($this);
  }

  function update(SplSubject $subject)
  {
    if($subject === $this->observable)
    {
      $this->doUpdate($subject);
    }
  }

  abstract function doUpdate(Observable $observable);
}
