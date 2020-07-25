<?php

declare(strict_types=1);

namespace GildedRose;

abstract class AbstractGildedRose
{
    /**
     * @var Item
     */
    protected $item;

    public function reduceQuality(): void
    {
        if ($this->item->quality > 0) {
            --$this->item->quality;
        }
    }

    public function increaseQuality(): void
    {
        if ($this->item->quality < 50) {
            ++$this->item->quality;
        }
    }

    public function reduceSellIn(): void
    {
        --$this->item->sell_in;
    }

    public function zeroQuality(): void
    {
        $this->item->quality = 0;
    }

    public function hasSellInPassed(): bool
    {
        return $this->item->sell_in < 0;
    }

    public function update(): void
    {
    }
}
