<?php

/**
 *
 */
class Observable implements SplSubject
{
  private $storage;
  private $dateTimeUTC;

  function __construct()
  {
    $this->storage = new SplObjectStorage();
  }

  function setDateTime($dateTimeUTC)
  {
    $this->dateTimeUTC = $dateTimeUTC;
  }

  function getDateTime()
  {
    return $this->dateTimeUTC;
  }

  function attach(SplObserver $observer)
  {
    $this->storage->attach($observer);
  }

  function detach(SplObserver $observer)
  {
    $this->storage->detach($observer);
  }

  function notify()
  {
    foreach($this->storage as $obj)
    {
      $obj->update($this);
    }
  }
  //...
}
