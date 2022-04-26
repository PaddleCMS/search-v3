<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer\Handler;

use DateTime;
use JMS\Serializer\Handler\DateHandler;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

final class DateTimeHandler implements SubscribingHandlerInterface
{

  /** @var \JMS\Serializer\Handler\DateHandler */
  private $handler;

  public function __construct(DateHandler $handler)
  {
    $this->handler = $handler;
  }

  public function deserializeDateTimeFromJson(JsonDeserializationVisitor $visitor, $data, array $type): ?\DateTimeInterface
  {
    if ((string)$data === '') {
      return null;
    }

    if (substr($data, -1) === 'Z') {
      $type['params'][0] = 'Y-m-d\TH:i:s.u\Z';
    }

    return $this->handler->deserializeDateTimeFromJson($visitor, $data, $type);
  }

  public static function getSubscribingMethods()
  {
    return DateHandler::getSubscribingMethods();
  }

}
