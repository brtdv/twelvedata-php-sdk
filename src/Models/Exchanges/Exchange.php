<?PHP

namespace Brtdv\TwelveData\Models\Exchanges;

use DateTimeZone;
use Brtdv\TwelveData\Models\ApiModel;
use Webmozart\Assert\Assert;

class Exchange implements ApiModel
{
    private ?string $name;
    private ?string $code;
    private ?string $country;
    private ?DateTimeZone $timezone;
    private ?Plan $access;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::stringNotEmpty($data['name']);
        Assert::stringNotEmpty($data['code']);
        Assert::stringNotEmpty($data['country']);
        Assert::stringNotEmpty($data['timezone']);
        Assert::nullOrIsArray($data['access'] ?? null); // Optional return value

        $object = new self();

        $object->name     = $data['name'] ?? null;
        $object->code     = $data['code'] ?? null;
        $object->country  = $data['country'] ?? null;
        $object->timezone = $data['timezone'] ? new DateTimeZone($data['timezone']) : null;

        if (isset($data['access'])) {
            $object->access = Plan::create($data['access'], $timeZone);
        }

        return $object;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): static
    {
        $this->code = $code;
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

    public function getTimezone(): ?DateTimeZone
    {
        return $this->timezone;
    }

    public function setTimezone(?DateTimeZone $timezone): static
    {
        $this->timezone = $timezone;
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
