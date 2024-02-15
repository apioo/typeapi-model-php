<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Key;

#[Description('Represents a reference type. A reference type points to a specific type at the definitions map')]
class ReferenceType implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Key('$ref')]
    #[Description('Reference to a type under the definitions map')]
    protected ?string $ref = null;
    /**
     * @var \PSX\Record\Record<string>|null
     */
    #[Key('$template')]
    #[Description('Optional concrete type definitions which replace generic template types')]
    protected ?\PSX\Record\Record $template = null;
    public function setRef(?string $ref) : void
    {
        $this->ref = $ref;
    }
    public function getRef() : ?string
    {
        return $this->ref;
    }
    public function setTemplate(?\PSX\Record\Record $template) : void
    {
        $this->template = $template;
    }
    public function getTemplate() : ?\PSX\Record\Record
    {
        return $this->template;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('$ref', $this->ref);
        $record->put('$template', $this->template);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

