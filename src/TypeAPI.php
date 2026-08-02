<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('The root specification object of TypeAPI.')]
class TypeAPI extends \TypeSchema\Model\TypeSchema implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('Optional base URL of the service. If specified, client SDKs do not require users to manually specify a base URL.')]
    protected ?string $baseUrl = null;
    /**
     * @var \PSX\Record\Record<Operation>|null
     */
    #[Description('A map of operations provided by the API. Keys should use dot-notation to group operations into logical units (e.g., product.getAll or enterprise.product.execute).')]
    protected ?\PSX\Record\Record $operations = null;
    #[Description('Describes the default authorization mechanism used across the API.')]
    protected ?Security $security = null;
    public function setBaseUrl(?string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }
    public function getBaseUrl(): ?string
    {
        return $this->baseUrl;
    }
    /**
     * @param \PSX\Record\Record<Operation>|null $operations
     */
    public function setOperations(?\PSX\Record\Record $operations): void
    {
        $this->operations = $operations;
    }
    /**
     * @return \PSX\Record\Record<Operation>|null
     */
    public function getOperations(): ?\PSX\Record\Record
    {
        return $this->operations;
    }
    public function setSecurity(?Security $security): void
    {
        $this->security = $security;
    }
    public function getSecurity(): ?Security
    {
        return $this->security;
    }
    /**
     * @return \PSX\Record\RecordInterface<mixed>
     */
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = parent::toRecord();
        $record->put('baseUrl', $this->baseUrl);
        $record->put('operations', $this->operations);
        $record->put('security', $this->security);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

