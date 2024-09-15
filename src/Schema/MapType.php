<?php

declare(strict_types = 1);

namespace TypeAPI\Model\Schema;

use PSX\Schema\Attribute\Description;

#[Description('Represents a map type. A map type contains variable key value entries of a specific type')]
class MapType extends CommonType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('')]
    protected ?string $type = null;
    #[Description('')]
    protected ArrayType|BooleanType|NumberType|IntegerType|StringType|AnyType|IntersectionType|UnionType|ReferenceType|GenericType|null $additionalProperties = null;
    #[Description('Positive integer value')]
    protected ?int $maxProperties = null;
    #[Description('Positive integer value')]
    protected ?int $minProperties = null;
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setAdditionalProperties(ArrayType|BooleanType|NumberType|IntegerType|StringType|AnyType|IntersectionType|UnionType|ReferenceType|GenericType|null $additionalProperties) : void
    {
        $this->additionalProperties = $additionalProperties;
    }
    public function getAdditionalProperties() : ArrayType|BooleanType|NumberType|IntegerType|StringType|AnyType|IntersectionType|UnionType|ReferenceType|GenericType|null
    {
        return $this->additionalProperties;
    }
    public function setMaxProperties(?int $maxProperties) : void
    {
        $this->maxProperties = $maxProperties;
    }
    public function getMaxProperties() : ?int
    {
        return $this->maxProperties;
    }
    public function setMinProperties(?int $minProperties) : void
    {
        $this->minProperties = $minProperties;
    }
    public function getMinProperties() : ?int
    {
        return $this->minProperties;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('type', $this->type);
        $record->put('additionalProperties', $this->additionalProperties);
        $record->put('maxProperties', $this->maxProperties);
        $record->put('minProperties', $this->minProperties);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

