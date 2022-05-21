<?php

namespace App\Services;

interface IParser
{
    public function parse(string $url): void;
}
