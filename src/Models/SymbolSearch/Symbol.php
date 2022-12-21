<?PHP

namespace Brtdv\TwelveData\Models\SymbolSearch;

use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Brtdv\TwelveData\Models\Exchanges\Plan;
use Webmozart\Assert\Assert;

class Symbol implements ApiModel
{
    private ?string $symbol;
    private ?string $instrumentName;
    private ?string $exchange;
    private ?string $micCode;
    private ?DateTimeZone $exchangeTimezone;
    private ?string $instrumentType;
    private ?string $country;
    private ?string $currency;
    private ?Plan $access;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::nullOrStringNotEmpty($data['symbol']);
        Assert::nullOrStringNotEmpty($data['instrument_name']);
        Assert::nullOrStringNotEmpty($data['exchange']);
        Assert::nullOrStringNotEmpty($data['mic_code']);
        Assert::nullOrStringNotEmpty($data['exchange_timezone']);
        Assert::nullOrStringNotEmpty($data['instrument_type']);
        Assert::nullOrStringNotEmpty($data['country']);
        Assert::nullOrStringNotEmpty($data['currency']);
        Assert::nullOrIsArray($data['access'] ?? null); // Optional return value

        $object = new self();

        $object->symbol           = $data['symbol'] ?? null;
        $object->instrumentName   = $data['instrument_name'] ?? null;
        $object->exchange         = $data['exchange'] ?? null;
        $object->micCode          = $data['mic_code'] ?? null;
        $object->exchangeTimezone = $data['exchange_timezone'] ? new DateTimeZone($data['exchange_timezone']) : null;
        $object->instrumentType   = $data['instrument_type'] ?? null;
        $object->country          = $data['country'] ?? null;
        $object->currency         = $data['currency'] ?? null;

        if (isset($data['access'])) {
            $object->access = Plan::create($data['access'], $timeZone);
        }

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

    public function getInstrumentName(): ?string
    {
        return $this->instrumentName;
    }

    public function setInstrumentName(?string $instrumentName): static
    {
        $this->instrumentName = $instrumentName;
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

    public function getExchangeTimezone(): ?DateTimeZone
    {
        return $this->exchangeTimezone;
    }

    public function setExchangeTimezone(?DateTimeZone $exchangeTimezone): static
    {
        $this->exchangeTimezone = $exchangeTimezone;
        return $this;
    }

    public function getInstrumentType(): ?string
    {
        return $this->instrumentType;
    }

    public function setInstrumentType(?string $instrumentType): static
    {
        $this->instrumentType = $instrumentType;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;
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

    public function getAccess(): ?Plan
    {
        return $this->access;
    }

    public function setAccess(?Plan $access): static
    {
        $this->access = $access;
        return $this;
    }
}
