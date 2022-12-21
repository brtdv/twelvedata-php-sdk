<?PHP

namespace Brtdv\TwelveData\Exception;

use RuntimeException;
use Throwable;
use Brtdv\TwelveData\Models\Status;

class ApiException extends RuntimeException
{
    private Status $status;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null, ?Status $status = null)
    {
        parent::__construct($message, $code, $previous);
        $this->status = $status;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }
}
