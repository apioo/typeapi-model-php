<?php

declare(strict_types = 1);

namespace TypeAPI\Model\API;

use PSX\Schema\Attribute\Description;

#[Description('')]
class Response implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('The associated HTTP response code. For error responses it is possible to use the 499, 599 or 999 status code to catch all errors')]
    protected ?int $code = null;
    #[Description('')]
    protected ?\TypeAPI\Model\Schema\ReferenceType $schema = null;
    #[Description('In case the data is not a JSON payload which you can describe with a schema you can select a content type')]
    protected ?string $contentType = null;
    public function setCode(?int $code) : void
    {
        $this->code = $code;
    }
    public function getCode() : ?int
    {
        return $this->code;
    }
    public function setSchema(?\TypeAPI\Model\Schema\ReferenceType $schema) : void
    {
        $this->schema = $schema;
    }
    public function getSchema() : ?\TypeAPI\Model\Schema\ReferenceType
    {
        return $this->schema;
    }
    public function setContentType(?string $contentType) : void
    {
        $this->contentType = $contentType;
    }
    public function getContentType() : ?string
    {
        return $this->contentType;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('code', $this->code);
        $record->put('schema', $this->schema);
        $record->put('contentType', $this->contentType);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

