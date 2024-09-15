<?php

declare(strict_types = 1);

namespace TypeAPI\Model\Schema;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Key;

#[Description('The root TypeSchema')]
class TypeSchema implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    /**
     * @var \PSX\Record\Record<string>|null
     */
    #[Key('$import')]
    #[Description('Contains external definitions which are imported. The imported schemas can be used via the namespace i.e. \'my_namespace:my_type\'')]
    protected ?\PSX\Record\Record $import = null;
    /**
     * @var \PSX\Record\Record<StructType|MapType|ReferenceType>|null
     */
    #[Description('')]
    protected ?\PSX\Record\Record $definitions = null;
    #[Key('$ref')]
    #[Description('Reference to a root schema under the definitions key')]
    protected ?string $ref = null;
    public function setImport(?\PSX\Record\Record $import) : void
    {
        $this->import = $import;
    }
    public function getImport() : ?\PSX\Record\Record
    {
        return $this->import;
    }
    public function setDefinitions(?\PSX\Record\Record $definitions) : void
    {
        $this->definitions = $definitions;
    }
    public function getDefinitions() : ?\PSX\Record\Record
    {
        return $this->definitions;
    }
    public function setRef(?string $ref) : void
    {
        $this->ref = $ref;
    }
    public function getRef() : ?string
    {
        return $this->ref;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('$import', $this->import);
        $record->put('definitions', $this->definitions);
        $record->put('$ref', $this->ref);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

