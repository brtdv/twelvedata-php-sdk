<?PHP

namespace Brtdv\TwelveData;

use Brtdv\TwelveData\Api\CoreData;
use Brtdv\TwelveData\Api\ReferenceData;
use Brtdv\TwelveData\HttpClient\HttpClientConfigurator;
use Brtdv\TwelveData\HttpClient\RequestBuilder;
use Brtdv\TwelveData\Hydrator\Hydrator;
use Brtdv\TwelveData\Hydrator\ModelHydrator;
use Psr\Http\Client\ClientInterface;

/**
 * Unofficial TwelveData PHP SDK
 * For more information, see: https://twelvedata.com & https://twelvedata.com/docs#getting-started
 *
 * @author Bert Devriese <bert@builtinbruges.com>
 */
class TwelveData
{
    private HttpClientConfigurator $clientConfigurator;
    private ClientInterface $httpClient;
    private RequestBuilder $requestBuilder;
    private Hydrator $hydrator;

    public function __construct(HttpClientConfigurator $clientConfigurator, ?RequestBuilder $requestBuilder = null, ?Hydrator $hydrator = null)
    {
        $this->clientConfigurator = $clientConfigurator;
        $this->requestBuilder     = $requestBuilder ?? new RequestBuilder();
        $this->hydrator           = $hydrator ?? new ModelHydrator();
        $this->httpClient         = $clientConfigurator->createConfiguredClient();
    }

    public static function create(string $apiKey, string $endpoint = 'https://api.twelvedata.com'): self
    {
        $httpClientConfigurator = (new HttpClientConfigurator())
            ->setApiKey($apiKey)
            ->setEndpoint($endpoint);

        return new self($httpClientConfigurator);
    }

    public function getHttpClientConfigurator(): HttpClientConfigurator
    {
        return $this->clientConfigurator;
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * All "Reference Data" related API calls
     * See also: https://twelvedata.com/docs#reference-data
     *
     * @return ReferenceData
     */
    public function referenceData(): ReferenceData
    {
        return new ReferenceData($this->httpClient, $this->requestBuilder, $this->hydrator);
    }


    /**
     * All "Core Data" related API calls
     * See also: https://twelvedata.com/docs#core-data
     *
     * @return CoreData
     */
    public function coreData(): CoreData
    {
        return new CoreData($this->httpClient, $this->requestBuilder, $this->hydrator);
    }
}
