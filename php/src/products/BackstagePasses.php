<?php

declare(strict_types=1);

namespace GildedRose\products;

use GildedRose\Item;

class BackstagePasses extends AbstractProduct
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function update(): void
    {
        $this->reduceSellIn();
        if ($this->hasSellInPassed()) {
            $this->zeroQuality();
            return;
        }
        $this->increaseQuality();
        if ($this->item->sell_in < 10) {
            $this->increaseQuality();
        }
        if ($this->item->sell_in < 5) {
            $this->increaseQuality();
        }
    }
}
