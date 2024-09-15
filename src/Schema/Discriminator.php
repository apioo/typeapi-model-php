<?php

declare(strict_types = 1);

namespace TypeAPI\Model\Schema;

use PSX\Schema\Attribute\Description;

#[Description('Adds support for polymorphism. The discriminator is an object name that is used to differentiate between other schemas which may satisfy the payload description')]
class Discriminator implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('The name of the property in the payload that will hold the discriminator value')]
    protected ?string $propertyName = null;
    /**
     * @var \PSX\Record\Record<string>|null
     */
    #[Description('An object to hold mappings between payload values and schema names or references')]
    protected ?\PSX\Record\Record $mapping = null;
    public function setPropertyName(?string $propertyName) : void
    {
        $this->propertyName = $propertyName;
    }
    public function getPropertyName() : ?string
    {
        return $this->propertyName;
    }
    public function setMapping(?\PSX\Record\Record $mapping) : void
    {
        $this->mapping = $mapping;
    }
    public function getMapping() : ?\PSX\Record\Record
    {
        return $this->mapping;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('propertyName', $this->propertyName);
        $record->put('mapping', $this->mapping);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

