<?PHP

namespace Brtdv\TwelveData\Models;

interface StatusProvider
{
    public function getStatus(): ?string;
}
