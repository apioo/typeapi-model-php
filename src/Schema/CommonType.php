<?php

declare(strict_types = 1);

namespace TypeAPI\Model\Schema;

use PSX\Schema\Attribute\Description;

#[Description('Represents a base type. Every type extends from this common type and shares the defined properties')]
class CommonType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('General description of this type, should not contain any new lines.')]
    protected ?string $description = null;
    #[Description('Type of the property')]
    protected ?string $type = null;
    #[Description('Indicates whether it is possible to use a null value')]
    protected ?bool $nullable = null;
    #[Description('Indicates whether this type is deprecated')]
    protected ?bool $deprecated = null;
    #[Description('Indicates whether this type is readonly')]
    protected ?bool $readonly = null;
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setNullable(?bool $nullable) : void
    {
        $this->nullable = $nullable;
    }
    public function getNullable() : ?bool
    {
        return $this->nullable;
    }
    public function setDeprecated(?bool $deprecated) : void
    {
        $this->deprecated = $deprecated;
    }
    public function getDeprecated() : ?bool
    {
        return $this->deprecated;
    }
    public function setReadonly(?bool $readonly) : void
    {
        $this->readonly = $readonly;
    }
    public function getReadonly() : ?bool
    {
        return $this->readonly;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('description', $this->description);
        $record->put('type', $this->type);
        $record->put('nullable', $this->nullable);
        $record->put('deprecated', $this->deprecated);
        $record->put('readonly', $this->readonly);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

