<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('')]
class Response implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('The associated HTTP response code')]
    protected ?int $code = null;
    #[Description('')]
    protected ?ReferenceType $schema = null;
    public function setCode(?int $code) : void
    {
        $this->code = $code;
    }
    public function getCode() : ?int
    {
        return $this->code;
    }
    public function setSchema(?ReferenceType $schema) : void
    {
        $this->schema = $schema;
    }
    public function getSchema() : ?ReferenceType
    {
        return $this->schema;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('code', $this->code);
        $record->put('schema', $this->schema);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

