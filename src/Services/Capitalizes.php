<?php

namespace App\Services;

class Capitalizes implements Transform
{

    public function transform(string $string): string
    {
        // TODO: Implement transform() method.
        for ($i= 0; $i < strlen($string); $i++){
            if($i % 2 == 0){
                $string = strtoupper($string[$i]);
            }
        }
        return $string;
    }
}