<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('Represents an array type. An array type contains an ordered list of a specific type')]
class ArrayType extends CommonType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('')]
    protected ?string $type = null;
    #[Description('')]
    protected BooleanType|NumberType|IntegerType|StringType|AnyType|ReferenceType|GenericType|null $items = null;
    #[Description('Positive integer value')]
    protected ?int $maxItems = null;
    #[Description('Positive integer value')]
    protected ?int $minItems = null;
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setItems(BooleanType|NumberType|IntegerType|StringType|AnyType|ReferenceType|GenericType|null $items) : void
    {
        $this->items = $items;
    }
    public function getItems() : BooleanType|NumberType|IntegerType|StringType|AnyType|ReferenceType|GenericType|null
    {
        return $this->items;
    }
    public function setMaxItems(?int $maxItems) : void
    {
        $this->maxItems = $maxItems;
    }
    public function getMaxItems() : ?int
    {
        return $this->maxItems;
    }
    public function setMinItems(?int $minItems) : void
    {
        $this->minItems = $minItems;
    }
    public function getMinItems() : ?int
    {
        return $this->minItems;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('type', $this->type);
        $record->put('items', $this->items);
        $record->put('maxItems', $this->maxItems);
        $record->put('minItems', $this->minItems);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

