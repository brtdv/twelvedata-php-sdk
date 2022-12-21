<?PHP

namespace Brtdv\TwelveData\Models\Quote;

use Brtdv\TwelveData\Models\ApiModel;
use DateTimeZone;
use RuntimeException;
use Webmozart\Assert\Assert;

class Range implements ApiModel
{
    private ?float $from;
    private ?float $to;

    /**
     * @return self
     */
    public static function create(array $data, ?DateTimeZone $timeZone = null)
    {
        Assert::numeric($data['from']);
        Assert::numeric($data['to']);

        $object = new self();

        $object->from = isset($data['from']) ? floatval($data['from']) : null;
        $object->to   = isset($data['to']) ? floatval($data['to']) : null;

        return $object;
    }

    public static function createFromString(string $string)
    {
        Assert::stringNotEmpty($string);

        if (false !== preg_match('/(\d+(.?\d+)?)\s{1}\-\s{1}(\d+(.?\d+)?)/i', $string, $matches))
        {
            return static::create([
                'from'  => floatval($matches[1]),
                'to' => floatval($matches[3]),
            ]);
        }

        throw new RuntimeException('Invalid Range string');
    }

    public function getFrom(): ?float
    {
        return $this->from;
    }

    public function setFrom(?float $from): static
    {
        $this->from = $from;
        return $this;
    }

    public function getTo(): ?float
    {
        return $this->to;
    }

    public function setTo(?float $to): static
    {
        $this->to = $to;
        return $this;
    }
}
