<?php
require_once 'Observer.php';

/**
 *
 */
class Subject extends Observer
{
  private $days;
  private $hour;
  private $min;
  private $timezone;
  private $message;

  function setDaysOfWeek($days)
  {
    $this->days = $days;
  }

  function setTimezone($timezone)
  {
    $this->timezone = $timezone;
  }

  function setTime($time)
  {
    $timeArray = explode(':', $time);
    $this->hour = $timeArray[0];
    $this->min = $timeArray[1];
  }

  function setMessage($message)
  {
    $this->message = $message;
  }

  function getTimezone()
  {
    $this->timezone;
  }

  function getTime()
  {
    $this->time;
  }

  function getMessage()
  {
    $this->message;
  }

  function isTrueDay($dayOfWeek)
  {
    if($this->dayConvert($dayOfWeek) & $this->days)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function dayConvert($dayOfWeek)
  {
    switch ($dayOfWeek)
    {
      case '1':
        return decbin(64);
        break;
      case '2':
        return decbin(32);
        break;
      case '3':
        return decbin(16);
        break;
      case '4':
        return decbin(8);
        break;
      case '5':
        return decbin(4);
        break;
      case '6':
        return decbin(2);
        break;
      case '0':
        return decbin(1);
        break;
      default:
        return decbin(0);
        break;
    }
  }

  function doUpdate(Observable $observable)
  {
    $observable->getDateTime()->add(new DateInterval('P'.$this->timezone.'M')); //UTC + offset of timezone


    if( $observable->getDateTime()->format('H') > $this->hour &&
        $observable->getDateTime()->format('i') > $this->min &&
        $this->isTrueDay(date('w', $observable->getDateTime()->getTimestamp() )))
    {
      echo 'Началось событие: ' . $this->message . "\n";
    }
  }
}

?>
