<?php

declare(strict_types=1);

namespace GildedRose;

class Sulfuras extends AbstractGildedRose
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }
}
