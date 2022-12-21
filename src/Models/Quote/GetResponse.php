<?PHP

namespace Brtdv\TwelveData\Models\Quote;

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
        $model->data = Quote::create($responseData);

        return $model;
    }

    public function getData(): Quote
    {
        return $this->data;
    }
}
