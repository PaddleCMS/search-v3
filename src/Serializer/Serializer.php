<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3\Serializer;

use CultuurNet\SearchV3\Serializer\Handler\CalendarSummaryHandler;
use CultuurNet\SearchV3\Serializer\Handler\DateTimeHandler;
use CultuurNet\SearchV3\ValueObjects\PagedCollection;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface as JMSSerializerInterface;
use SimpleBus\JMSSerializerBridge\SerializerMetadata;

final class Serializer implements SerializerInterface
{
    /**
     * @var JMSSerializerInterface
     */
    private $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()
            ->addMetadataDir(SerializerMetadata::directory(), SerializerMetadata::namespacePrefix())
            ->setAnnotationReader(new AnnotationReader())
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new DateTimeHandler(new \JMS\Serializer\Handler\DateHandler()));
                $registry->registerSubscribingHandler(new CalendarSummaryHandler());
            })
            ->build();
    }

    public function setSerializer(JMSSerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serialize($object)
    {
        $serializationContext = SerializationContext::create()
            ->setSerializeNull(true);

        // Register doctrine annotations loader.
        AnnotationRegistry::registerLoader('class_exists');

        return $this->serializer->serialize($object, 'json', $serializationContext);
    }

    public function deserialize(string $jsonString, string $class = PagedCollection::class)
    {
        $deserializationContext = DeserializationContext::create()
            ->setSerializeNull(true);

        // Register doctrine annotations loader.
        AnnotationRegistry::registerLoader('class_exists');

        return $this->serializer->deserialize($jsonString, $class, 'json', $deserializationContext);
    }
}
