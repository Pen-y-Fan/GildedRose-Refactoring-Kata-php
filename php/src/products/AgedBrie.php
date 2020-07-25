<?php

declare(strict_types=1);

namespace GildedRose\products;

use GildedRose\Item;

class AgedBrie extends AbstractProduct
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function update(): void
    {
        $this->reduceSellIn();
        $this->increaseQuality();
        if ($this->hasSellInPassed()) {
            $this->increaseQuality();
        }
    }
}
