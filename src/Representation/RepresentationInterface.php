<?php

namespace App\Representation;

interface RepresentationInterface
{
    public function getData();
    public function addMeta($key, $value);
}
