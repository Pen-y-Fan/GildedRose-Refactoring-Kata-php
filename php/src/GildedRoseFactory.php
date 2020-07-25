<?php

declare(strict_types=1);

namespace GildedRose;

class GildedRoseFactory
{
    public function create(Item $item): AbstractGildedRose
    {
        switch ($item->name) {
            case 'Sulfuras, Hand of Ragnaros':
                return new Sulfuras($item);
            case 'Aged Brie':
                return new AgedBrie($item);
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePasses($item);
            case 'Conjured Mana Cake':
                return new Conjured($item);
        }
        return new Normal($item);
    }
}
