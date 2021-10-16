<?php

declare(strict_types=1);

namespace GildedRose;

class BackstagePassesToATafkal80EtcConcert implements ProductInterface
{
    public function __construct(
        private Item $item
    ) {
    }

    public function update(): void
    {
        $this->increaseQuality();

        if ($this->item->sell_in < 11) {
            $this->increaseQuality();
        }
        if ($this->item->sell_in < 6) {
            $this->increaseQuality();
        }

        --$this->item->sell_in;

        if ($this->item->sell_in < 0) {
            $this->item->quality = 0;
        }
    }

    private function increaseQuality(): void
    {
        if ($this->item->quality < 50) {
            ++$this->item->quality;
        }
    }
}
