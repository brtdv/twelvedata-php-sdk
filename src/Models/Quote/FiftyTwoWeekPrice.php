<?PHP

namespace Brtdv\TwelveData\Models\Quote;

use Brtdv\TwelveData\Models\ApiModel;
use DateTimeZone;
use Webmozart\Assert\Assert;

class FiftyTwoWeekPrice implements ApiModel
{
    private ?float $low;
    private ?float $high;
    private ?float $lowChange;
    private ?float $highChange;
    private ?float $lowChangePercent;
    private ?float $highChangePercent;
    private ?Range $range;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::numeric($data['low']);
        Assert::numeric($data['high']);
        Assert::numeric($data['low_change']);
        Assert::numeric($data['high_change']);
        Assert::numeric($data['low_change_percent']);
        Assert::numeric($data['high_change_percent']);
        Assert::stringNotEmpty($data['range']);

        $object = new self();

        $object->low               = isset($data['low']) ? floatval($data['low']) : null;
        $object->high              = isset($data['high']) ? floatval($data['high']) : null;
        $object->lowChange         = isset($data['lowChange']) ? floatval($data['lowChange']) : null;
        $object->highChange        = isset($data['highChange']) ? floatval($data['highChange']) : null;
        $object->lowChangePercent  = isset($data['lowChangePercent']) ? floatval($data['lowChangePercent']) : null;
        $object->highChangePercent = isset($data['highChangePercent']) ? floatval($data['highChangePercent']) : null;
        $object->range             = isset($data['range']) ? Range::createFromString($data['range']) : null;

        return $object;
    }

    public function getHighChangePercent(): ?float
    {
        return $this->highChangePercent;
    }

    public function setHighChangePercent(?float $highChangePercent): static
    {
        $this->highChangePercent = $highChangePercent;
        return $this;
    }

    public function getLowChangePercent(): ?float
    {
        return $this->lowChangePercent;
    }

    public function setLowChangePercent(?float $lowChangePercent): static
    {
        $this->lowChangePercent = $lowChangePercent;
        return $this;
    }

    public function getHighChange(): ?float
    {
        return $this->highChange;
    }

    public function setHighChange(?float $highChange): static
    {
        $this->highChange = $highChange;
        return $this;
    }

    public function getLowChange(): ?float
    {
        return $this->lowChange;
    }

    public function setLowChange(?float $lowChange): static
    {
        $this->lowChange = $lowChange;
        return $this;
    }

    public function getHigh(): ?float
    {
        return $this->high;
    }

    public function setHigh(?float $high): static
    {
        $this->high = $high;
        return $this;
    }

    public function getLow(): ?float
    {
        return $this->low;
    }

    public function setLow(?float $low): static
    {
        $this->low = $low;
        return $this;
    }

    public function getRange(): ?Range
    {
        return $this->range;
    }

    public function setRange(?Range $range): static
    {
        $this->range = $range;
        return $this;
    }
}
