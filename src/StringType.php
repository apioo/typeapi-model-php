<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Minimum;

#[Description('Represents a string type')]
class StringType extends ScalarType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('')]
    protected ?string $type = null;
    #[Description('Positive integer value')]
    #[Minimum(0)]
    protected ?int $maxLength = null;
    #[Description('Positive integer value')]
    #[Minimum(0)]
    protected ?int $minLength = null;
    #[Description('')]
    protected ?string $pattern = null;
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setMaxLength(?int $maxLength) : void
    {
        $this->maxLength = $maxLength;
    }
    public function getMaxLength() : ?int
    {
        return $this->maxLength;
    }
    public function setMinLength(?int $minLength) : void
    {
        $this->minLength = $minLength;
    }
    public function getMinLength() : ?int
    {
        return $this->minLength;
    }
    public function setPattern(?string $pattern) : void
    {
        $this->pattern = $pattern;
    }
    public function getPattern() : ?string
    {
        return $this->pattern;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('type', $this->type);
        $record->put('maxLength', $this->maxLength);
        $record->put('minLength', $this->minLength);
        $record->put('pattern', $this->pattern);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

