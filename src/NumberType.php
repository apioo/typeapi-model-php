<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('Represents a number type')]
class NumberType extends ScalarType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('')]
    protected ?string $type = null;
    #[Description('')]
    protected ?float $maximum = null;
    #[Description('')]
    protected ?float $minimum = null;
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setMaximum(?float $maximum) : void
    {
        $this->maximum = $maximum;
    }
    public function getMaximum() : ?float
    {
        return $this->maximum;
    }
    public function setMinimum(?float $minimum) : void
    {
        $this->minimum = $minimum;
    }
    public function getMinimum() : ?float
    {
        return $this->minimum;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('type', $this->type);
        $record->put('maximum', $this->maximum);
        $record->put('minimum', $this->minimum);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

