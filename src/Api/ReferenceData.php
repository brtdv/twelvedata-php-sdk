<?PHP

namespace Brtdv\TwelveData\Api;

use Brtdv\TwelveData\Exception\ApiParameterException;
use Brtdv\TwelveData\Models\ApiResponse;
use Brtdv\TwelveData\Models\Stocks\GetResponse as StocksGetResponse;
use Brtdv\TwelveData\Models\ForexPairs\GetResponse as ForexPairsGetResponse;
use Brtdv\TwelveData\Models\CryptoCurrencies\GetResponse as CryptoCurrenciesGetResponse;
use Brtdv\TwelveData\Models\Exchanges\GetResponse as ExchangesGetResponse;
use Brtdv\TwelveData\Models\SymbolSearch\GetResponse as SymbolSearchGetResponse;

/**
 * All reference data related API calls
 * See also: https://twelvedata.com/docs#reference-data
 *
 * @author Bert Devriese <bert@builtinbruges.com>
 */
class ReferenceData extends HttpApi
{
    /**
     * @return StocksGetResponse
     */
    public function stocks(array $params = []): ApiResponse
    {
        $response = $this->httpGet('/stocks', $params);

        return $this->hydrateResponse($response, StocksGetResponse::class);
    }

    /**
     * @return ForexPairsGetResponse
     */
    public function forexPairs(array $params = []): ApiResponse
    {
        $response = $this->httpGet('/forex_pairs', $params);

        return $this->hydrateResponse($response, ForexPairsGetResponse::class);
    }

    /**
     * @return CryptoCurrenciesGetResponse
     */
    public function cryptoCurrencies(array $params = []): ApiResponse
    {
        $response = $this->httpGet('/cryptocurrencies', $params);

        return $this->hydrateResponse($response, CryptoCurrenciesGetResponse::class);
    }

    /**
     * @return ExchangesGetResponse
     */
    public function exchanges(array $params = []): ApiResponse
    {
        $response = $this->httpGet('/exchanges', $params);

        return $this->hydrateResponse($response, ExchangesGetResponse::class);
    }

    /**
     * @return SymbolSearchGetResponse
     */
    public function symbolSearch(array $params = []): ApiResponse
    {
        if (!isset($params['symbol'])) {
            throw new ApiParameterException('Parameter "symbol" is required');
        }

        $response = $this->httpGet('/symbol_search', $params);

        return $this->hydrateResponse($response, SymbolSearchGetResponse::class);
    }
}
