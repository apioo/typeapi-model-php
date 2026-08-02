<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('Describes an argument passed to an operation.')]
class Argument implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('The content type to use when the payload cannot be described by a JSON schema.')]
    protected ?string $contentType = null;
    #[Description('Specifies where the argument value is located: path, query, header, or body. If set to path, the operation path must include a matching path variable.')]
    protected ?string $in = null;
    #[Description('Optional name of the parameter in the path, query, or header. If omitted, the key of the arguments map is used.')]
    protected ?string $name = null;
    #[Description('JSON schema describing the structure of the argument payload.')]
    protected ?\TypeSchema\Model\PropertyType $schema = null;
    public function setContentType(?string $contentType): void
    {
        $this->contentType = $contentType;
    }
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    public function setIn(?string $in): void
    {
        $this->in = $in;
    }
    public function getIn(): ?string
    {
        return $this->in;
    }
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    public function getName(): ?string
    {
        return $this->name;
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
        $record->put('contentType', $this->contentType);
        $record->put('in', $this->in);
        $record->put('name', $this->name);
        $record->put('schema', $this->schema);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

