<?PHP

namespace Brtdv\TwelveData\Api;

use Psr\Http\Client as Psr18;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Brtdv\TwelveData\Exception\NetworkException;
use Brtdv\TwelveData\HttpClient\RequestBuilder;
use Brtdv\TwelveData\Hydrator\Hydrator;
use Brtdv\TwelveData\Models\ApiResponse;

class HttpApi
{
    private $httpClient;
    private $requestBuilder;
    private $hydrator;

    public function __construct(ClientInterface $httpClient, RequestBuilder $requestBuilder, Hydrator $hydrator)
    {
        $this->httpClient     = $httpClient;
        $this->requestBuilder = $requestBuilder;
        $this->hydrator       = $hydrator;
    }

    protected function httpGet(string $path, array $parameters = [], array $requestHeaders = []): ResponseInterface
    {
        if (count($parameters) > 0) {
            $path .= '?'.http_build_query($parameters);
        }

        try {
            $response = $this->httpClient->sendRequest(
                $this->requestBuilder->create('GET', $path, $requestHeaders)
            );
        } catch (Psr18\NetworkExceptionInterface $e) {
            throw new NetworkException('Service unreachable', 0, $e);
        }

        return $response;
    }

    protected function hydrateResponse(ResponseInterface $response, string $class): ApiResponse
    {
        return $this->hydrator->hydrate($response, $class);
    }
}
