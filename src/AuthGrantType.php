<?php

namespace Muscobytes\AdmitadApi;

use Muscobytes\AdmitadApi\Trait\ConstantsTrait;

class AuthGrantType
{
    use ConstantsTrait;

    public const TYPE_CLIENT_CREDENTIALS = 'client_credentials';

    public const TYPE_REFRESH_TOKEN = 'refresh_token';

    private string $type = '';

    public function __construct(string $type)
    {
        if (!in_array($type, self::getConstantsWithPrefix('TYPE_'))) {
            throw new \InvalidArgumentException('Invalid grant type');
        }
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}