<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case 'Sulfuras, Hand of Ragnaros':
                    continue 2;
                case 'Aged Brie':
                    $this->reduceSellIn($item);
                    $this->increaseQuality($item);
                    if ($this->hasSellInPassed($item)) {
                        $this->increaseQuality($item);
                    }
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->reduceSellIn($item);
                    if ($this->hasSellInPassed($item)) {
                        $this->zeroQuality($item);
                        continue 2;
                    }
                    $this->increaseQuality($item);
                    if ($item->sell_in < 10) {
                        $this->increaseQuality($item);
                    }
                    if ($item->sell_in < 5) {
                        $this->increaseQuality($item);
                    }
                    break;
                default:
                    $this->reduceSellIn($item);
                    $this->reduceQuality($item);
                    if ($this->hasSellInPassed($item)) {
                        $this->reduceQuality($item);
                    }
            }
        }
    }

    private function reduceQuality(Item $item): void
    {
        if ($item->quality > 0) {
            --$item->quality;
        }
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality < 50) {
            ++$item->quality;
        }
    }

    private function reduceSellIn(Item $item): void
    {
        --$item->sell_in;
    }

    private function zeroQuality(Item $item): void
    {
        $item->quality = 0;
    }

    private function hasSellInPassed(Item $item): bool
    {
        return $item->sell_in < 0;
    }
}
