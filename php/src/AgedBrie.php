<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrie implements ProductInterface
{
    public function __construct(
        private Item $item
    ) {
    }

    public function update(): void
    {
        $this->increaseQuality();

        --$this->item->sell_in;

        if ($this->item->sell_in < 0) {
            $this->increaseQuality();
        }
    }

    /**
     * Increase quality to a maximum of 50
     */
    private function increaseQuality(): void
    {
        if ($this->item->quality < 50) {
            ++$this->item->quality;
        }
    }
}
