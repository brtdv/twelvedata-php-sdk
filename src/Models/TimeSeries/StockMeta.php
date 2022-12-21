<?PHP

namespace Brtdv\TwelveData\Models\TimeSeries;

use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Webmozart\Assert\Assert;

class StockMeta implements ApiModel
{
    private ?string $symbol;
    private ?string $interval;
    private ?string $currency;
    private ?DateTimeZone $exchangeTimezone;
    private ?string $exchange;
    private ?string $micCode;
    private ?string $type;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::nullOrStringNotEmpty($data['symbol']);
        Assert::nullOrStringNotEmpty($data['interval']);
        Assert::nullOrStringNotEmpty($data['currency']);
        Assert::nullOrStringNotEmpty($data['exchange_timezone']);
        Assert::nullOrStringNotEmpty($data['exchange']);
        Assert::nullOrStringNotEmpty($data['mic_code']);
        Assert::nullOrStringNotEmpty($data['type']);

        $object = new self();

        $object->symbol           = $data['symbol'] ?? null;
        $object->interval         = $data['interval'] ?? null;
        $object->currency         = $data['currency'] ?? null;
        $object->exchangeTimezone = new DateTimeZone($data['exchange_timezone']) ?? null;
        $object->exchange         = $data['exchange'] ?? null;
        $object->micCode          = $data['mic_code'] ?? null;
        $object->type             = $data['type'] ?? null;

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

    public function getInterval(): ?string
    {
        return $this->interval;
    }

    public function setInterval(?string $interval): static
    {
        $this->interval = $interval;
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

    public function getExchangeTimezone(): DateTimeZone|null
    {
        return $this->exchangeTimezone;
    }

    public function setExchangeTimezone(?DateTimeZone $exchangeTimezone): static
    {
        $this->exchangeTimezone = $exchangeTimezone;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;
        return $this;
    }
}
