<?php

namespace App\Usecases\Category\Output;

class CategoriesOutput
{
    public int $id;
    public string $name;
    public int $serviceId;

    public function __construct(int $id, string $name, int $serviceId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->serviceId = $serviceId;
    }
}
