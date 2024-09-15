<?php

declare(strict_types = 1);

namespace TypeAPI\Model\Schema;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Key;

#[Description('Represents a struct type. A struct type contains a fix set of defined properties')]
class StructType extends CommonType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Key('$final')]
    #[Description('Indicates that a struct is final, this means it is not possible to extend this struct')]
    protected ?bool $final = null;
    #[Key('$extends')]
    #[Description('Extends an existing type with the referenced type')]
    protected ?string $extends = null;
    #[Description('')]
    protected ?string $type = null;
    /**
     * @var \PSX\Record\Record<MapType|ArrayType|BooleanType|NumberType|IntegerType|StringType|AnyType|IntersectionType|UnionType|ReferenceType|GenericType>|null
     */
    #[Description('')]
    protected ?\PSX\Record\Record $properties = null;
    /**
     * @var array<string>|null
     */
    #[Description('')]
    protected ?array $required = null;
    public function setFinal(?bool $final) : void
    {
        $this->final = $final;
    }
    public function getFinal() : ?bool
    {
        return $this->final;
    }
    public function setExtends(?string $extends) : void
    {
        $this->extends = $extends;
    }
    public function getExtends() : ?string
    {
        return $this->extends;
    }
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setProperties(?\PSX\Record\Record $properties) : void
    {
        $this->properties = $properties;
    }
    public function getProperties() : ?\PSX\Record\Record
    {
        return $this->properties;
    }
    /**
     * @param array<string>|null $required
     */
    public function setRequired(?array $required) : void
    {
        $this->required = $required;
    }
    /**
     * @return array<string>|null
     */
    public function getRequired() : ?array
    {
        return $this->required;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('$final', $this->final);
        $record->put('$extends', $this->extends);
        $record->put('type', $this->type);
        $record->put('properties', $this->properties);
        $record->put('required', $this->required);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

