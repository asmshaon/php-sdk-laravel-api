<?php

declare(strict_types=1);

namespace SDKAbuAPI;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use SDKAbuAPI\Core\BaseClient;
use SDKAbuAPI\Core\Util;
use SDKAbuAPI\Services\PostsService;
use SDKAbuAPI\Services\UsersService;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public PostsService $posts;

    /**
     * @api
     */
    public UsersService $users;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('SDK_ABU_API_API_KEY'));

        $baseUrl ??= getenv('SDK_ABU_API_BASE_URL') ?: '/api';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('sdk-abu-api/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->posts = new PostsService($this);
        $this->users = new UsersService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->apiKey ? ['Authorization' => "Bearer {$this->apiKey}"] : [];
    }
}
