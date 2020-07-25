<?php

declare(strict_types=1);

namespace GildedRose;

class Normal extends AbstractGildedRose
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function update(): void
    {
        $this->reduceSellIn();
        $this->reduceQuality();
        if ($this->hasSellInPassed()) {
            $this->reduceQuality();
        }
    }
}
