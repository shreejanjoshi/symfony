<?php

namespace App\Services;
use App\Services\Logs;
use App\Services\Transform;

class Master
{
    private Transform $transform;
    private Logs $logs;

    public function __construct(Transform $transform, Logs $logs)
    {
        $this->transform = $transform;
        $this->logs = $logs;
    }

    public function transform(string $string): string
    {
        return $this->transform->transform($string);
    }

    public function logs(string $string){
        return $this->logs->logs($string);
    }
}