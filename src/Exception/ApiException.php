<?PHP

namespace Brtdv\TwelveData\Exception;

use RuntimeException;
use Throwable;


class ApiException extends RuntimeException
{
    private string $status;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null, ?string $status = null)
    {
        parent::__construct($message, $code, $previous);
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
