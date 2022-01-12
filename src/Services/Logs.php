<?php

namespace App\Services;

class Logs implements Transform
{

    public function transform(string $string): string
    {
        // TODO: Implement transform() method.
        $newMsg = "/n";
        $file = "log.info";
        file_put_contents($file, $string.$newMsg, FILE_APPEND | LOCK_EX);
    }
}