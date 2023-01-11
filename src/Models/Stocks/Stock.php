<?PHP

namespace Brtdv\TwelveData\Models\Stocks;

use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Exception;
use Webmozart\Assert\Assert;

class Stock implements ApiModel
{
    private ?string $symbol;
    private ?string $name;
    private ?string $currency;
    private ?string $exchange;
    private ?string $micCode;
    private ?string $country;
    private ?string $type;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::nullOrStringNotEmpty($data['symbol'] ?? null);
        Assert::nullOrString($data['name'] ?? null);
        Assert::nullOrStringNotEmpty($data['currency'] ?? null);
        Assert::nullOrStringNotEmpty($data['exchange'] ?? null);
        Assert::nullOrStringNotEmpty($data['mic_code'] ?? null);
        Assert::nullOrString($data['country'] ?? null);
        Assert::nullOrStringNotEmpty($data['type'] ?? null);

        $object = new self();

        $object->symbol   = $data['symbol'] ?? null;
        $object->name     = $data['name'] ?? null;
        $object->currency = $data['currency'] ?? null;
        $object->exchange = $data['exchange'] ?? null;
        $object->micCode  = $data['mic_code'] ?? null;
        $object->country  = $data['country'] ?? null;
        $object->type     = $data['type'] ?? null;

        return $object;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol($symbol): static
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName($name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency($currency): static
    {
        $this->currency = $currency;
        return $this;
    }

    public function getExchange(): ?string
    {
        return $this->exchange;
    }

    public function setExchange($exchange): static
    {
        $this->exchange = $exchange;
        return $this;
    }

    public function getMicCode(): ?string
    {
        return $this->micCode;
    }

    public function setMicCode($micCode): static
    {
        $this->micCode = $micCode;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry($country): static
    {
        $this->country = $country;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType($type): static
    {
        $this->type = $type;
        return $this;
    }
}
