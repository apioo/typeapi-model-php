<?php

declare(strict_types = 1);

namespace TypeAPI\Model\Schema;

use PSX\Schema\Attribute\Description;

#[Description('Represents an union type. An union type can contain one of the provided types')]
class UnionType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('')]
    protected ?string $description = null;
    #[Description('')]
    protected ?Discriminator $discriminator = null;
    /**
     * @var array<BooleanType|NumberType|IntegerType|StringType|ReferenceType>|null
     */
    #[Description('Contains an array of references. The reference must only point to a struct type')]
    protected ?array $oneOf = null;
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setDiscriminator(?Discriminator $discriminator) : void
    {
        $this->discriminator = $discriminator;
    }
    public function getDiscriminator() : ?Discriminator
    {
        return $this->discriminator;
    }
    /**
     * @param array<BooleanType|NumberType|IntegerType|StringType|ReferenceType>|null $oneOf
     */
    public function setOneOf(?array $oneOf) : void
    {
        $this->oneOf = $oneOf;
    }
    /**
     * @return array<BooleanType|NumberType|IntegerType|StringType|ReferenceType>|null
     */
    public function getOneOf() : ?array
    {
        return $this->oneOf;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('description', $this->description);
        $record->put('discriminator', $this->discriminator);
        $record->put('oneOf', $this->oneOf);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

