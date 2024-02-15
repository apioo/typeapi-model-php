<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Key;

#[Description('Represents a generic type. A generic type can be used i.e. at a map or array which then can be replaced on reference via the $template keyword')]
class GenericType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Key('$generic')]
    #[Description('')]
    protected ?string $generic = null;
    public function setGeneric(?string $generic) : void
    {
        $this->generic = $generic;
    }
    public function getGeneric() : ?string
    {
        return $this->generic;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('$generic', $this->generic);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

