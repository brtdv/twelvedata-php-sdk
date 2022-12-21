<?php

namespace Brtdv\TwelveData\HttpClient;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class RequestBuilder
{
    private ?RequestFactoryInterface $requestFactory;
    private ?StreamFactoryInterface $streamFactory;
    private ?MultipartStreamBuilder $multipartStreamBuilder;

    public function __construct()
    {
        $this->requestFactory         = Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory          = Psr17FactoryDiscovery::findStreamFactory();
        $this->multipartStreamBuilder = new MultipartStreamBuilder();
    }

    public function create(string $method, string $uri, array $headers = [], $body = null): RequestInterface
    {
        if (!is_array($body)) {
            $stream = $this->getStreamFactory()->createStream((string) $body);

            return $this->createRequest($method, $uri, $headers, $stream);
        }

        $builder = $this->getMultipartStreamBuilder();

        foreach ($body as $item) {
            $name = $this->getItemValue($item, 'name');
            $content = $this->getItemValue($item, 'content');
            unset($item['name']);
            unset($item['content']);

            $builder->addResource($name, $content, $item);
        }

        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();
        $builder->reset();

        $headers['Content-Type'] = 'multipart/form-data; boundary="'.$boundary.'"';
        return $this->createRequest($method, $uri, $headers, $multipartStream);
    }

    private function getRequestFactory(): ?RequestFactoryInterface
    {
        return $this->requestFactory;
    }

    /**
     * @param  RequestFactoryInterface $requestFactory
     * @return $this
     */
    public function setRequestFactory(RequestFactoryInterface $requestFactory): self
    {
        $this->requestFactory = $requestFactory;
        return $this;
    }

    private function getStreamFactory(): ?StreamFactoryInterface
    {
        return $this->streamFactory;
    }

    /**
     * @param  StreamFactoryInterface $streamFactory
     * @return $this
     */
    public function setStreamFactory(?StreamFactoryInterface $streamFactory): self
    {
        $this->streamFactory = $streamFactory;
        return $this;
    }

    private function getMultipartStreamBuilder(): ?MultipartStreamBuilder
    {
        return $this->multipartStreamBuilder;
    }

    /**
     * @param  MultipartStreamBuilder $multipartStreamBuilder
     * @return $this
     */
    public function setMultipartStreamBuilder(MultipartStreamBuilder $multipartStreamBuilder): self
    {
        $this->multipartStreamBuilder = $multipartStreamBuilder;
        return $this;
    }

    /**
     * @param  string           $method
     * @param  string           $uri
     * @param  array            $headers
     * @param  StreamInterface  $stream
     * @return RequestInterface
     */
    private function createRequest(string $method, string $uri, array $headers, StreamInterface $stream): RequestInterface
    {
        $request = $this->getRequestFactory()->createRequest($method, $uri);
        $request = $request->withBody($stream);

        foreach ($headers as $name => $value) {
            $request = $request->withAddedHeader($name, $value);
        }

        return $request;
    }

    /**
     * @param  array        $item
     * @param  string       $key
     * @return mixed|string
     */
    private function getItemValue(array $item, string $key)
    {
        if (is_bool($item[$key])) {
            return (string) $item[$key];
        }

        return $item[$key];
    }
}
