<?php

declare(strict_types = 1);

namespace TypeAPI\Model\API;

use PSX\Schema\Attribute\Description;

#[Description('')]
class Security implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('The global security type of the API must be one of: httpBasic, httpBearer, apiKey or oauth2')]
    protected ?string $type = null;
    #[Description('Relevant for type "apiKey", the name of the header or query parameter i.e. "X-Api-Key"')]
    protected ?string $name = null;
    #[Description('Relevant for type "apiKey", must be either "header" or "query"')]
    protected ?string $in = null;
    #[Description('Relevant for type "oauth2", the OAuth2 token endpoint')]
    protected ?string $tokenUrl = null;
    #[Description('Relevant for type "oauth2", optional the OAuth2 authorization endpoint')]
    protected ?string $authorizationUrl = null;
    /**
     * @var array<string>|null
     */
    #[Description('Relevant for type "oauth2", optional OAuth2 scopes')]
    protected ?array $scopes = null;
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setName(?string $name) : void
    {
        $this->name = $name;
    }
    public function getName() : ?string
    {
        return $this->name;
    }
    public function setIn(?string $in) : void
    {
        $this->in = $in;
    }
    public function getIn() : ?string
    {
        return $this->in;
    }
    public function setTokenUrl(?string $tokenUrl) : void
    {
        $this->tokenUrl = $tokenUrl;
    }
    public function getTokenUrl() : ?string
    {
        return $this->tokenUrl;
    }
    public function setAuthorizationUrl(?string $authorizationUrl) : void
    {
        $this->authorizationUrl = $authorizationUrl;
    }
    public function getAuthorizationUrl() : ?string
    {
        return $this->authorizationUrl;
    }
    /**
     * @param array<string>|null $scopes
     */
    public function setScopes(?array $scopes) : void
    {
        $this->scopes = $scopes;
    }
    /**
     * @return array<string>|null
     */
    public function getScopes() : ?array
    {
        return $this->scopes;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('type', $this->type);
        $record->put('name', $this->name);
        $record->put('in', $this->in);
        $record->put('tokenUrl', $this->tokenUrl);
        $record->put('authorizationUrl', $this->authorizationUrl);
        $record->put('scopes', $this->scopes);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

