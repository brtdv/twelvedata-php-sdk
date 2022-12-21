<?PHP

namespace Brtdv\TwelveData\Models\Quote;

use Brtdv\TwelveData\Models\ApiModel;
use DateTime;
use DateTimeZone;
use Webmozart\Assert\Assert;

class Quote implements ApiModel
{
    private ?string $symbol;
    private ?string $name;
    private ?string $exchange;
    private ?string $micCode;
    private ?string $currency;
    private ?DateTime $datetime;
    private ?DateTime $timestamp;
    private ?float $open;
    private ?float $high;
    private ?float $low;
    private ?float $close;
    private ?int $volume;
    private ?float $previousClose;
    private ?float $change;
    private ?float $percentChange;
    private ?int $averageVolume;
    private ?float $rolling1DChange;
    private ?float $rolling7DChange;
    private ?float $rollingPeriodChange;
    private ?bool $isMarketOpen;
    private ?FiftyTwoWeekPrice $fiftyTwoWeek;
    private ?float $extendedChange;
    private ?float $extendedPercentChange;
    private ?float $extendedPrice;
    private ?DateTime $extendedTimestamp;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::stringNotEmpty($data['symbol']);
        Assert::stringNotEmpty($data['name']);
        Assert::stringNotEmpty($data['exchange']);
        Assert::stringNotEmpty($data['mic_code']);
        Assert::stringNotEmpty($data['currency']);
        Assert::stringNotEmpty($data['datetime']);
        Assert::numeric($data['timestamp']);
        Assert::numeric($data['open']);
        Assert::numeric($data['high']);
        Assert::numeric($data['low']);
        Assert::numeric($data['close']);
        Assert::numeric($data['volume']);
        Assert::numeric($data['previous_close']);
        Assert::numeric($data['change']);
        Assert::numeric($data['percent_change']);
        Assert::numeric($data['average_volume']);
        Assert::nullOrNumeric($data['rolling_1d_change'] ?? null);
        Assert::nullOrNumeric($data['rolling_7d_change'] ?? null);
        Assert::nullOrNumeric($data['rolling_period_change'] ?? null);
        Assert::boolean($data['is_market_open']);
        Assert::isArray($data['fifty_two_week']);
        Assert::nullOrNumeric($data['extended_change'] ?? null);
        Assert::nullOrNumeric($data['extended_percent_change'] ?? null);
        Assert::nullOrNumeric($data['extended_price'] ?? null);
        Assert::nullOrNumeric($data['extended_timestamp'] ?? null);

        $object = new self();

        $object->symbol                = $data['symbol'] ?? null;
        $object->name                  = $data['name'] ?? null;
        $object->exchange              = $data['exchange'] ?? null;
        $object->micCode               = $data['mic_code'] ?? null;
        $object->currency              = $data['currency'] ?? null;
        $object->datetime              = isset($data['datetime']) ? DateTime::createFromFormat('Y-m-d H:i:s', $data['datetime'].' 12:00:00', new DateTimeZone('UTC')) : null;
        $object->timestamp             = isset($data['timestamp']) ? (new DateTime('now', new DateTimeZone('UTC')))->setTimestamp($data['timestamp']) : null;
        $object->open                  = isset($data['open']) ? floatval($data['open']) : null;
        $object->high                  = isset($data['high']) ? floatval($data['high']) : null;
        $object->low                   = isset($data['low']) ? floatval($data['low']) : null;
        $object->close                 = isset($data['close']) ? floatval($data['close']) : null;
        $object->volume                = isset($data['volume']) ? intval($data['volume']) : null;
        $object->previousClose         = isset($data['previous_close']) ? floatval($data['previous_close']) : null;
        $object->change                = isset($data['change']) ? floatval($data['change']) : null;
        $object->percentChange         = isset($data['percent_change']) ? floatval($data['percent_change']) : null;
        $object->averageVolume         = isset($data['average_volume']) ? intval($data['average_volume']) : null;
        $object->rolling1DChange       = isset($data['rolling_1d_change']) ? floatval($data['rolling_1d_change']) : null;
        $object->rolling7DChange       = isset($data['rolling_7d_change']) ? floatval($data['rolling_7d_change']) : null;
        $object->rollingPeriodChange   = isset($data['rolling_period_change']) ? floatval($data['rolling_period_change']) : null;
        $object->isMarketOpen          = isset($data['is_market_open']) ? boolval($data['is_market_open']) : null;
        $object->fiftyTwoWeek          = isset($data['fifty_two_week']) ? FiftyTwoWeekPrice::create($data['fifty_two_week'], $timeZone) : null;
        $object->extendedChange        = isset($data['extended_change']) ? floatval($data['extended_change']) : null;
        $object->extendedPercentChange = isset($data['extended_percent_change']) ? floatval($data['extended_percent_change']) : null;
        $object->extendedPrice         = isset($data['extended_price']) ? floatval($data['extended_price']) : null;
        $object->extendedTimestamp     = isset($data['extended_timestamp']) ? DateTime::createFromFormat('u', $data['extended_timestamp'], new DateTimeZone('UTC')) : null;

        return $object;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(?string $symbol): static
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getExchange(): ?string
    {
        return $this->exchange;
    }

    public function setExchange(?string $exchange): static
    {
        $this->exchange = $exchange;
        return $this;
    }

    public function getMicCode(): ?string
    {
        return $this->micCode;
    }

    public function setMicCode(?string $micCode): static
    {
        $this->micCode = $micCode;
        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): static
    {
        $this->currency = $currency;
        return $this;
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

    public function getTimestamp(): ?DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp(?DateTime $timestamp): static
    {
        $this->timestamp = $timestamp;
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

    public function getPreviousClose(): ?float
    {
        return $this->previousClose;
    }

    public function setPreviousClose(?float $previousClose): static
    {
        $this->previousClose = $previousClose;
        return $this;
    }

    public function getChange(): ?float
    {
        return $this->change;
    }

    public function setChange(?float $change): static
    {
        $this->change = $change;
        return $this;
    }

    public function getPercentChange(): ?float
    {
        return $this->percentChange;
    }

    public function setPercentChange(?float $percentChange): static
    {
        $this->percentChange = $percentChange;
        return $this;
    }

    public function getAverageVolume(): ?int
    {
        return $this->averageVolume;
    }

    public function setAverageVolume(?int $averageVolume): static
    {
        $this->averageVolume = $averageVolume;
        return $this;
    }

    public function getRolling1DChange(): ?float
    {
        return $this->rolling1DChange;
    }

    public function setRolling1DChange(?float $rolling1DChange): static
    {
        $this->rolling1DChange = $rolling1DChange;
        return $this;
    }

    public function getRolling7DChange(): ?float
    {
        return $this->rolling7DChange;
    }

    public function setRolling7DChange(?float $rolling7DChange): static
    {
        $this->rolling7DChange = $rolling7DChange;
        return $this;
    }

    public function getRollingPeriodChange(): ?float
    {
        return $this->rollingPeriodChange;
    }

    public function setRollingPeriodChange(?float $rollingPeriodChange): static
    {
        $this->rollingPeriodChange = $rollingPeriodChange;
        return $this;
    }

    public function getIsMarketOpen(): ?bool
    {
        return $this->isMarketOpen;
    }

    public function setIsMarketOpen(?bool $isMarketOpen): static
    {
        $this->isMarketOpen = $isMarketOpen;
        return $this;
    }

    public function getFiftyTwoWeek(): ?FiftyTwoWeekPrice
    {
        return $this->fiftyTwoWeek;
    }

    public function setFiftyTwoWeek(?FiftyTwoWeekPrice $fiftyTwoWeek): static
    {
        $this->fiftyTwoWeek = $fiftyTwoWeek;
        return $this;
    }

    public function getExtendedChange(): ?float
    {
        return $this->extendedChange;
    }

    public function setExtendedChange(?float $extendedChange): static
    {
        $this->extendedChange = $extendedChange;
        return $this;
    }

    public function getExtendedPercentChange(): ?float
    {
        return $this->extendedPercentChange;
    }

    public function setExtendedPercentChange(?float $extendedPercentChange): static
    {
        $this->extendedPercentChange = $extendedPercentChange;
        return $this;
    }

    public function getExtendedPrice(): ?float
    {
        return $this->extendedPrice;
    }

    public function setExtendedPrice(?float $extendedPrice): static
    {
        $this->extendedPrice = $extendedPrice;
        return $this;
    }

    public function getExtendedTimestamp(): ?DateTime
    {
        return $this->extendedTimestamp;
    }

    public function setExtendedTimestamp(?DateTime $extendedTimestamp): static
    {
        $this->extendedTimestamp = $extendedTimestamp;
        return $this;
    }
}
