<?php

declare(strict_types = 1);

namespace TypeAPI\Model;

use PSX\Schema\Attribute\Description;

#[Description('Describes HTTP Basic authentication, requiring a base64-encoded username and password.')]
class SecurityHttpBasic extends Security implements \JsonSerializable, \PSX\Record\RecordableInterface
{
}

