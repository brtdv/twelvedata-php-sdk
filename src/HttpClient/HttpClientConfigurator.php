<?php

namespace Brtdv\TwelveData\HttpClient;

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\QueryDefaultsPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\UriFactoryInterface;

class HttpClientConfigurator
{
    private $endpoint = 'https://api.twelvedata.com';
    private $debug = false;
    private $apiKey;
    private UriFactoryInterface $uriFactory;
    private ClientInterface $httpClient;

    public function __construct()
    {
        $this->uriFactory = Psr17FactoryDiscovery::findUriFactory();
        $this->httpClient = Psr18ClientDiscovery::find();
    }

    public function createConfiguredClient(): PluginClient
    {
        $plugins = [
            new AddHostPlugin($this->getUriFactory()->createUri($this->endpoint)),
            new HeaderDefaultsPlugin([
                'User-Agent'    => 'brtdv-twelvedata-php-sdk/v0.1 (https://github.com/brtdv/twelvedata-api)',
                'Authorization' => 'apikey '.$this->getApiKey(),
            ])
        ];

        return new PluginClient($this->getHttpClient(), $plugins);
    }

    public function setDebug(bool $debug): self
    {
        $this->debug = $debug;
        return $this;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    private function getUriFactory(): UriFactoryInterface
    {
        return $this->uriFactory;
    }

    public function setUriFactory(UriFactoryInterface $uriFactory): self
    {
        $this->uriFactory = $uriFactory;
        return $this;
    }

    private function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    public function setHttpClient(ClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;
        return $this;
    }
}
