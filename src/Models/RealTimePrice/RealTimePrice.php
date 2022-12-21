<?PHP

namespace Brtdv\TwelveData\Models\RealTimePrice;

use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Webmozart\Assert\Assert;

class RealTimePrice implements ApiModel
{
    private ?float $price;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::nullOrNumeric($data['price']);

        $object = new self();
        $object->price = $data['price'] ? floatval($data['price']) : null;

        return $object;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;
        return $this;
    }
}
