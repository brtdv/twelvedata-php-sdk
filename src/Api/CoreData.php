<?PHP

namespace Brtdv\TwelveData\Api;

use Brtdv\TwelveData\Models\ApiResponse;
use Brtdv\TwelveData\Models\TimeSeries\GetResponse as TimeSeriesGetResponse;
use Brtdv\TwelveData\Models\Quote\GetResponse as QuoteGetResponse;
use Brtdv\TwelveData\Models\RealTimePrice\GetResponse as RealTimePriceGetResponse;
use Webmozart\Assert\Assert;

/**
 * All core data related API calls
 * See also: https://twelvedata.com/docs#core-data
 *
 * @author Bert Devriese <bert@builtinbruges.com>
 */
class CoreData extends HttpApi
{
    public function timeSeries(array $params = []): ApiResponse
    {
        Assert::keyExists($params, 'symbol');
        Assert::keyExists($params, 'interval');

        $response = $this->httpGet('/time_series', $params);

        return $this->hydrateResponse($response, TimeSeriesGetResponse::class);
    }

    public function quote(array $params = []): ApiResponse
    {
        Assert::keyExists($params, 'symbol');

        $response = $this->httpGet('/quote', $params);

        return $this->hydrateResponse($response, QuoteGetResponse::class);
    }

    public function realTimePrice(array $params = []): ApiResponse
    {
        Assert::keyExists($params, 'symbol');

        $response = $this->httpGet('/symbol', $params);

        return $this->hydrateResponse($response, RealTimePriceGetResponse::class);
    }
}
