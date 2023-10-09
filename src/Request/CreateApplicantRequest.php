<?php

declare(strict_types=1);

namespace FaritSlv\SumSub\Request;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;

final class CreateApplicantRequest
{
    private $data;

    private $levelName;

    public function __construct(array $data = [], ?string $levelName = null)
    {
        $this->data = $data;
        $this->levelName = $levelName;
    }

    public function getStream(): StreamInterface
    {
        return Utils::streamFor(json_encode($this->data));
    }

    public function getLevelName(): ?string
    {
        return $this->levelName;
    }
}
