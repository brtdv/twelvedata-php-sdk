<?PHP

namespace Brtdv\TwelveData\Models\ForexPairs;

use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Webmozart\Assert\Assert;

class ForexPair implements ApiModel
{
    private ?string $symbol;
    private ?string $currencyGroup;
    private ?string $currencyBase;
    private ?string $currencyQuote;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::stringNotEmpty($data['symbol']);
        Assert::stringNotEmpty($data['currency_group']);
        Assert::stringNotEmpty($data['currency_base']);
        Assert::stringNotEmpty($data['currency_quote']);

        $object = new self();

        $object->symbol        = $data['symbol'] ?? null;
        $object->currencyGroup = $data['currency_group'] ?? null;
        $object->currencyBase  = $data['currency_base'] ?? null;
        $object->currencyQuote = $data['currency_quote'] ?? null;

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

    public function getCurrencyGroup(): ?string
    {
        return $this->currencyGroup;
    }

    public function setCurrencyGroup($currencyGroup): static
    {
        $this->currencyGroup = $currencyGroup;
        return $this;
    }

    public function getCurrencyBase(): ?string
    {
        return $this->currencyBase;
    }

    public function setCurrencyBase($currencyBase): static
    {
        $this->currencyBase = $currencyBase;
        return $this;
    }

    public function getCurrencyQuote(): ?string
    {
        return $this->currencyQuote;
    }

    public function setCurrencyQuote($currencyQuote): static
    {
        $this->currencyQuote = $currencyQuote;
        return $this;
    }
}
