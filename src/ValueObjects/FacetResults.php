<?php

namespace CultuurNet\SearchV3\ValueObjects;


use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\TypeParser;
use JMS\Serializer\Annotation\HandlerCallback;

class FacetResults
{

    /**
     * @var array
     */
    protected $facetResults;

    /**
     * @return array
     */
    public function getFacetResults() {
        return $this->facetResults;
    }

    /**
     * @param array $facetResults
     * @return FacetResults
     */
    public function setFacetResults($facetResults) {
        $this->facetResults = $facetResults;

        return $this;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(JsonDeserializationVisitor $visitor, $values, DeserializationContext $context)
    {
        foreach ($values as $facet_type => $results) {
            $this->facetResults[$facet_type] = new FacetResult($facet_type, $this->deserializeResults($results));
        }
    }

    /**
     *
     */
    protected function deserializeResults($results) {

        $items = [];
        foreach ($results as $value => $result) {
            $children = isset($result['children']) ? $this->deserializeResults($result['children']) : [];
            $items[] = new FacetResultItem($value, $result['name'], $result['count'], $children);
        }

        return $items;
    }

}