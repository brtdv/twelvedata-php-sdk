<?PHP

namespace Brtdv\TwelveData\Models;

use DateTimeZone;

interface ApiModel
{
    public static function create(array $data, ?DateTimeZone $timeZone = null);
}
