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

    public function transform(string $output)
    {
        return $this->transform->transform($output);
    }

    public function logs(string $output){
        return $this->logs->logs($output);
    }
}