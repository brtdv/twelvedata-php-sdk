<?PHP

namespace Brtdv\TwelveData\Models\CryptoCurrencies;

use Brtdv\TwelveData\Models\ApiResponse;
use Brtdv\TwelveData\Models\StatusProvider;
use Brtdv\TwelveData\Models\StatusResponse;

class GetResponse implements ApiResponse, StatusProvider
{
    use StatusResponse;
    private $data;

    /**
     * @return self
     */
    public static function create(array $responseData)
    {
        $data = [];

        foreach ($responseData['data'] as $jsonData) {
            $data[] = CryptoCurrency::create($jsonData);
        }

        $model = new self();

        $model->data   = $data;
        $model->status = $responseData['status']

        return $model;
    }

    /**
     * @return CryptoCurrency[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}
