<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('Describes an API endpoint operation.')]
class Operation implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    /**
     * @var \PSX\Record\Record<Argument>|null
     */
    #[Description('All arguments provided to this operation. Each argument maps to an HTTP request location (e.g., path, query, header, or body).')]
    protected ?\PSX\Record\Record $arguments = null;
    #[Description('Indicates whether this operation requires authorization. If set to false, the client will omit authorization headers. Defaults to true.')]
    protected ?bool $authorization = null;
    #[Description('A short description of this operation. Used in generated code docstrings; plain text without line breaks is recommended.')]
    protected ?string $description = null;
    #[Description('The HTTP method associated with this operation (e.g., GET, POST, PUT, DELETE).')]
    protected ?string $method = null;
    #[Description('The HTTP path associated with this operation. May contain path variables (e.g., /my/path/:year) which map to operation arguments.')]
    protected ?string $path = null;
    #[Description('The return type of this operation, which defaults to an HTTP status code of 200.')]
    protected ?Response $return = null;
    /**
     * @var array<string>|null
     */
    #[Description('An array of OAuth scopes required to access this specific operation.')]
    protected ?array $security = null;
    #[Description('Indicates the stability level of this operation: 0 (Deprecated), 1 (Experimental), 2 (Stable), or 3 (Legacy). Defaults to 1 (Experimental).')]
    protected ?int $stability = null;
    /**
     * @var array<Response>|null
     */
    #[Description('All exceptional states that can occur if the operation fails. Each exception is assigned an HTTP error status code.')]
    protected ?array $throws = null;
    /**
     * @param \PSX\Record\Record<Argument>|null $arguments
     */
    public function setArguments(?\PSX\Record\Record $arguments): void
    {
        $this->arguments = $arguments;
    }
    /**
     * @return \PSX\Record\Record<Argument>|null
     */
    public function getArguments(): ?\PSX\Record\Record
    {
        return $this->arguments;
    }
    public function setAuthorization(?bool $authorization): void
    {
        $this->authorization = $authorization;
    }
    public function getAuthorization(): ?bool
    {
        return $this->authorization;
    }
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }
    public function getMethod(): ?string
    {
        return $this->method;
    }
    public function setPath(?string $path): void
    {
        $this->path = $path;
    }
    public function getPath(): ?string
    {
        return $this->path;
    }
    public function setReturn(?Response $return): void
    {
        $this->return = $return;
    }
    public function getReturn(): ?Response
    {
        return $this->return;
    }
    /**
     * @param array<string>|null $security
     */
    public function setSecurity(?array $security): void
    {
        $this->security = $security;
    }
    /**
     * @return array<string>|null
     */
    public function getSecurity(): ?array
    {
        return $this->security;
    }
    public function setStability(?int $stability): void
    {
        $this->stability = $stability;
    }
    public function getStability(): ?int
    {
        return $this->stability;
    }
    /**
     * @param array<Response>|null $throws
     */
    public function setThrows(?array $throws): void
    {
        $this->throws = $throws;
    }
    /**
     * @return array<Response>|null
     */
    public function getThrows(): ?array
    {
        return $this->throws;
    }
    /**
     * @return \PSX\Record\RecordInterface<mixed>
     */
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('arguments', $this->arguments);
        $record->put('authorization', $this->authorization);
        $record->put('description', $this->description);
        $record->put('method', $this->method);
        $record->put('path', $this->path);
        $record->put('return', $this->return);
        $record->put('security', $this->security);
        $record->put('stability', $this->stability);
        $record->put('throws', $this->throws);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

