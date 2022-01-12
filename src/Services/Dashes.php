<?php

namespace App\Services;

class Dashes implements Transform
{

    public function transform(string $string): string
    {
        // TODO: Implement transform() method.
        return str_replace(" ", "-", $string);
    }
}