<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('Describes HTTP Bearer authentication, typically using a bearer token (e.g., JWT).')]
class SecurityHttpBearer extends Security implements \JsonSerializable, \PSX\Record\RecordableInterface
{
}

