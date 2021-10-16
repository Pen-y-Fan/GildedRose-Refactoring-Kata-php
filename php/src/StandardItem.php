<?php

declare(strict_types=1);

namespace GildedRose;

class StandardItem implements ProductInterface
{
    /**
     * @param Item $item
     */
    public function __construct(
        private Item $item
    ) {
    }

    public function update(): void
    {
        $this->reduceQuality();

        --$this->item->sell_in;

        if ($this->item->sell_in < 0) {
            $this->reduceQuality();
        }
    }

    private function reduceQuality(): void
    {
        if ($this->item->quality > 0) {
            --$this->item->quality;
        }
    }
}
