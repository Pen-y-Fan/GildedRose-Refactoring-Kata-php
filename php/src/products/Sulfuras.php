<?php

declare(strict_types=1);

namespace GildedRose\products;

use GildedRose\Item;

class Sulfuras extends AbstractProduct
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }
}
