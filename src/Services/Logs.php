<?php

namespace App\Services;

class Logs
{

    public function logs(string $output)
    {
        // TODO: Implement transform() method.
        $output .= "/n";
        $file = "log.info";
        file_put_contents($file, $output, FILE_APPEND);
    }
}