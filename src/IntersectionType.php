<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('Represents an intersection type')]
class IntersectionType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('')]
    protected ?string $description = null;
    /**
     * @var array<ReferenceType>|null
     */
    #[Description('Contains an array of references. The reference must only point to a struct type')]
    protected ?array $allOf = null;
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    /**
     * @param array<ReferenceType>|null $allOf
     */
    public function setAllOf(?array $allOf) : void
    {
        $this->allOf = $allOf;
    }
    /**
     * @return array<ReferenceType>|null
     */
    public function getAllOf() : ?array
    {
        return $this->allOf;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('description', $this->description);
        $record->put('allOf', $this->allOf);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

