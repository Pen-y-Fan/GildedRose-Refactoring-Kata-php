<?php

declare(strict_types=1);

namespace GildedRose;

class BackstagePasses extends AbstractGildedRose
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
