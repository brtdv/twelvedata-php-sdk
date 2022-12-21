<?PHP

namespace Brtdv\TwelveData\Models\CryptoCurrencies;

use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Webmozart\Assert\Assert;

class CryptoCurrency implements ApiModel
{
    private ?string $symbol;
    private ?array $availableExchanges;
    private ?string $currencyBase;
    private ?string $currencyQuote;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::stringNotEmpty($data['symbol']);
        Assert::isArray($data['available_exchanges']);
        Assert::stringNotEmpty($data['currency_base']);
        Assert::stringNotEmpty($data['currency_quote']);

        $object = new self();

        $object->symbol             = $data['symbol'] ?? null;
        $object->availableExchanges = $data['available_exchanges'] ?? null;
        $object->currencyBase       = $data['currency_base'] ?? null;
        $object->currencyQuote      = $data['currency_quote'] ?? null;

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

    public function getAvailableExchanges(): ?array
    {
        return $this->availableExchanges;
    }

    public function setAvailableExchanges(?array $availableExchanges): static
    {
        $this->availableExchanges = $availableExchanges;
        return $this;
    }

    public function getCurrencyBase(): ?string
    {
        return $this->currencyBase;
    }

    public function setCurrencyBase(?string $currencyBase): static
    {
        $this->currencyBase = $currencyBase;
        return $this;
    }

    public function getCurrencyQuote(): ?string
    {
        return $this->currencyQuote;
    }

    public function setCurrencyQuote(?string $currencyQuote): static
    {
        $this->currencyQuote = $currencyQuote;
        return $this;
    }
}
