<?PHP

namespace Brtdv\TwelveData\Models\RealTimePrice;

use Brtdv\TwelveData\Models\ApiResponse;

class GetResponse implements ApiResponse
{
    private $data;

    /**
     * @return self
     */
    public static function create(array $responseData)
    {
        $model = new self();
        $model->data = RealTimePrice::create($responseData);

        return $model;
    }

    public function getData(): RealTimePrice
    {
        return $this->data;
    }
}
