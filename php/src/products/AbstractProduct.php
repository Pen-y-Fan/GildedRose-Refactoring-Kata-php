<?php

declare(strict_types=1);

namespace GildedRose\products;

use GildedRose\Item;

abstract class AbstractProduct
{
    private const MAX_QUALITY = 50;
    private const MIN_QUALITY = 0;
    private const MIN_SELL_IN = 0;
    /**
     * @var Item
     */
    protected $item;

    public function reduceQuality(): void
    {
        if ($this->item->quality > self::MIN_QUALITY) {
            --$this->item->quality;
        }
    }

    public function increaseQuality(): void
    {
        if ($this->item->quality < self::MAX_QUALITY) {
            ++$this->item->quality;
        }
    }

    public function reduceSellIn(): void
    {
        --$this->item->sell_in;
    }

    public function zeroQuality(): void
    {
        $this->item->quality = self::MIN_QUALITY;
    }

    public function hasSellInPassed(): bool
    {
        return $this->item->sell_in < self::MIN_SELL_IN;
    }

    public function update(): void
    {
    }
}
