<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('Describes an HTTP response returned by an operation.')]
class Response implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('The HTTP status code associated with this response. Wildcard error status codes like 499, 599, or 999 can be used to catch all errors.')]
    protected ?int $code = null;
    #[Description('The content type to use when the response body cannot be described by a JSON schema.')]
    protected ?string $contentType = null;
    #[Description('JSON schema describing the structure of the response payload.')]
    protected ?\TypeSchema\Model\PropertyType $schema = null;
    public function setCode(?int $code): void
    {
        $this->code = $code;
    }
    public function getCode(): ?int
    {
        return $this->code;
    }
    public function setContentType(?string $contentType): void
    {
        $this->contentType = $contentType;
    }
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    public function setSchema(?\TypeSchema\Model\PropertyType $schema): void
    {
        $this->schema = $schema;
    }
    public function getSchema(): ?\TypeSchema\Model\PropertyType
    {
        return $this->schema;
    }
    /**
     * @return \PSX\Record\RecordInterface<mixed>
     */
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('code', $this->code);
        $record->put('contentType', $this->contentType);
        $record->put('schema', $this->schema);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

