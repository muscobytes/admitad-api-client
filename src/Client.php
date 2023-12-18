<?php

namespace Muscobytes\AdmitadApi;

use Muscobytes\AdmitadApi\Factory\HttpClientFactory;
use Muscobytes\HttpClient\Interface\HttpClientInterface;
use Muscobytes\HttpClient\Middleware\Authentication\BasicMiddleware;
use Muscobytes\HttpClient\Middleware\Authentication\BearerMiddleware;
use Muscobytes\HttpClient\Middleware\ContentTypeMiddleware;
use Muscobytes\HttpClient\Middleware\Payload\JsonMiddleware;
use Muscobytes\HttpClient\Middleware\Payload\QueryMiddleware;
use Psr\Http\Message\ResponseInterface;

final class Client
{
    const DEFAULT_LIMIT = 100;

    const DEFAULT_OFFSET = 0;


    public function __construct(
        private readonly string $baseUrl = 'https://api.admitad.com/',
        private ?HttpClientInterface $httpClient = null
    )
    {
        $this->httpClient = $httpClient ?: HttpClientFactory::create();
    }


    private function buildFilter(?int $id, ?array $filter = null, ?int $limit = null, ?int $offset = null): string
    {
        $id = is_null($id) ? '' : "/$id/";
        $pagination = [];
        if (!is_null($limit)) {
            $pagination['limit'] = $limit;
        }
        if (!is_null($offset)) {
            $pagination['offset'] = $offset;
        }
        $query = array_merge($filter, $pagination);
        $query = empty($query) ?: '?' . http_build_query($query);
        return $id . $query;
    }


    public function request(string $method, string $uri, array $middlewares = []): ResponseInterface
    {
        return $this->httpClient->request(
            $method,
            $this->baseUrl . $uri,
            $middlewares
        );
    }


    public function token(
        string $clientId,
        string $clientSecret,
        AuthScope $scope,
    ): array
    {
        return json_decode($this->request('POST', 'token/', [
            new BasicMiddleware($clientId, $clientSecret),
            new ContentTypeMiddleware('application/x-www-form-urlencoded;charset=UTF-8'),
            new QueryMiddleware([
                'grant_type' => (new AuthGrantType(AuthGrantType::TYPE_CLIENT_CREDENTIALS))->getType(),
                'client_id' => $clientId,
                'scope' => $scope->getScopes(),
            ])
        ])->getBody()->getContents(), true);
    }


    public function refreshToken(
        string $clientId,
        string $clientSecret,
        string $refreshToken
    ): array
    {
        return json_decode($this->request('POST', 'token/', [
            new ContentTypeMiddleware('application/x-www-form-urlencoded;charset=UTF-8'),
            new QueryMiddleware([
                'grant_type' => (new AuthGrantType(AuthGrantType::TYPE_REFRESH_TOKEN))->getType(),
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'refresh_token' => $refreshToken,
            ])
        ])->getBody()->getContents(), true);
    }


    public function advcampaigns(
        string $bearerToken,
        ?int $websiteId = null,
        ?array $filter = null,
        $limit = self::DEFAULT_LIMIT,
        $offset = self::DEFAULT_OFFSET,
    ): array
    {
        return json_decode($this->request(
            'GET',
                'advcampaigns/' . $this->buildFilter($websiteId, $filter, $limit, $offset),
            [
                new BearerMiddleware($bearerToken),
                new ContentTypeMiddleware('application/json'),
            ]
        )->getBody()->getContents(), true);
    }


    /**
     * AliExpress
     * Calculation of the reward for AliExpress products
     * https://developers.admitad.com/hc/en-us/articles/7930627976849-AliExpress
     */
    public function aliexpressCommissionRates(
        string $bearerToken,
        array $urls = [],
    ): array
    {
        return json_decode($this->request('GET', 'aliexpress/commission_rates/', [
            new BearerMiddleware($bearerToken),
            new ContentTypeMiddleware('application/json'),
            new JsonMiddleware(['urls' => $urls]),
        ])->getBody()->getContents(), true);
    }


    /**
     * Announcements
     * List of notifications
     * https://developers.admitad.com/hc/en-us/articles/7930503340945-Announcements-List-of-notifications
     */
    public function announcements(
        string $bearerToken,
        ?int $websiteId = null,
        $limit = self::DEFAULT_LIMIT,
        $offset = self::DEFAULT_OFFSET,
    ): array
    {
        return json_decode($this->request(
            'GET',
            'announcements/' . $this->buildFilter($websiteId, null, $limit, $offset),
            [
                new BearerMiddleware($bearerToken),
                new ContentTypeMiddleware('application/json'),
            ]
        )->getBody()->getContents(), true);
    }


    /**
     * Types of ad spaces
     * https://developers.admitad.com/hc/en-us/articles/7930496407825-Auxiliary-information
     */
    public function websitesKinds(
        string $bearerToken,
        $limit = self::DEFAULT_LIMIT,
        $offset = 0,
    ): array
    {
        return json_decode($this->request(
            'GET',
            'websites/kinds/' . $this->buildFilter(null, null, $limit, $offset),
            [
                new BearerMiddleware($bearerToken),
            ]
        )->getBody()->getContents(), true);
    }


    /**
     * Types of ad spaces
     * https://developers.admitad.com/hc/en-us/articles/7930496407825-Auxiliary-information#ad-space-regions
     */
    public function websitesRegions(
        string $bearerToken,
               $limit = self::DEFAULT_LIMIT,
               $offset = 0,
    ): array
    {
        return json_decode($this->request(
            'GET',
            'websites/regions/' . $this->buildFilter(null, null, $limit, $offset),
            [
                new BearerMiddleware($bearerToken),
            ]
        )->getBody()->getContents(), true);
    }




    public function coupons(
        string $bearerToken,
        ?int $websiteId = null,
        ?array $filter = null,
        $limit = self::DEFAULT_LIMIT,
        $offset = self::DEFAULT_OFFSET
    ): array
    {
        return json_decode($this->request(
            'GET',
            'coupons/' . $this->buildFilter($websiteId, $filter, $limit, $offset),
            [
                new BearerMiddleware($bearerToken),
            ]
        )->getBody()->getContents(), true);
    }
}