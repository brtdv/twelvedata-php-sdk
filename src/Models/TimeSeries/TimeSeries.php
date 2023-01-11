<?PHP

namespace Brtdv\TwelveData\Models\TimeSeries;

use DateTime;
use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Webmozart\Assert\Assert;

class TimeSeries implements ApiModel
{
    private ?DateTime $datetime;
    private ?float $open;
    private ?float $high;
    private ?float $low;
    private ?float $close;
    private ?int $volume;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::nullOrNumeric($data['open']);
        Assert::nullOrNumeric($data['high']);
        Assert::nullOrNumeric($data['low']);
        Assert::nullOrNumeric($data['close']);
        Assert::nullOrNumeric($data['volume']);

        $object = new self();

        $object->datetime = isset($data['datetime']) ? DateTime::createFromFormat('Y-m-d H:i:s', $data['datetime'], $timeZone) : null;
        $object->open     = $data['open'] ? floatval($data['open']) : 0;
        $object->high     = $data['high'] ? floatval($data['high']) : 0;
        $object->low      = $data['low'] ? floatval($data['low']) : 0;
        $object->close    = $data['close'] ? floatval($data['close']) : 0;
        $object->volume   = $data['volume'] ? intval($data['volume']) : 0;

        return $object;
    }

    public function getDatetime(): ?DateTime
    {
        return $this->datetime;
    }

    public function setDatetime(?DateTime $datetime): static
    {
        $this->datetime = $datetime;
        return $this;
    }

    public function getOpen(): ?float
    {
        return $this->open;
    }

    public function setOpen(?float $open): static
    {
        $this->open = $open;
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

    public function getClose(): ?float
    {
        return $this->close;
    }

    public function setClose(?float $close): static
    {
        $this->close = $close;
        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(?int $volume): static
    {
        $this->volume = $volume;
        return $this;
    }
}
