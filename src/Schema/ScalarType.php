<?php

declare(strict_types = 1);

namespace TypeAPI\Model\Schema;

use PSX\Schema\Attribute\Description;

#[Description('Represents a scalar type')]
class ScalarType extends CommonType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('Describes the specific format of this type i.e. date-time or int64')]
    protected ?string $format = null;
    /**
     * @var array<string|float>|null
     */
    #[Description('')]
    protected ?array $enum = null;
    public function setFormat(?string $format) : void
    {
        $this->format = $format;
    }
    public function getFormat() : ?string
    {
        return $this->format;
    }
    /**
     * @param array<string|float>|null $enum
     */
    public function setEnum(?array $enum) : void
    {
        $this->enum = $enum;
    }
    /**
     * @return array<string|float>|null
     */
    public function getEnum() : ?array
    {
        return $this->enum;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('format', $this->format);
        $record->put('enum', $this->enum);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

