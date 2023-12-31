<?php
declare(strict_types=1);

namespace Muscobytes\AdmitadApi\Factory;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Muscobytes\HttpClient\HttpClient;

final class HttpClientFactory
{
    public static function create(): HttpClient
    {
        return new HttpClient(
            Psr18ClientDiscovery::find(),
            Psr17FactoryDiscovery::findRequestFactory()
        );
    }
}
