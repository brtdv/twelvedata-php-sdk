<?PHP

namespace Brtdv\TwelveData\Models\Exchanges;

use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Webmozart\Assert\Assert;

class Plan implements ApiModel
{
    private ?string $global;
    private ?string $plan;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::stringNotEmpty($data['global']);
        Assert::stringNotEmpty($data['plan']);

        $object = new self();

        $object->global = $data['global'] ?? null;
        $object->plan   = $data['plan'] ?? null;

        return $object;
    }

    public function getGlobal(): ?string
    {
        return $this->global;
    }

    public function setGlobal(?string $global): static
    {
        $this->global = $global;
        return $this;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(?string $plan): static
    {
        $this->plan = $plan;
        return $this;
    }
}
