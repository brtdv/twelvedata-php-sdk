<?PHP

namespace Brtdv\TwelveData\Models\TimeSeries;

use Brtdv\TwelveData\Models\ApiResponse;
use Brtdv\TwelveData\Models\Status;
use Brtdv\TwelveData\Models\StatusProvider;
use Brtdv\TwelveData\Models\StatusResponse;

class GetResponse implements ApiResponse, StatusProvider
{
    use StatusResponse;
    private $meta;
    private $values;

    /**
     * @return self
     */
    public static function create(array $responseData)
    {
        $model = new self();

        $model->meta   = StockMeta::create($responseData['meta']);
        $model->status = Status::from($responseData['status']);

        $values = [];

        foreach ($responseData['values'] as $jsonData) {
            $values[] = TimeSeries::create($jsonData, $model->getMeta()->getExchangeTimezone());
        }

        $model->values = $values;

        return $model;
    }

    /**
     * @return StockMeta
     */
    public function getMeta(): StockMeta
    {
        return $this->meta;
    }

    /**
     * @return TimeSeries[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
