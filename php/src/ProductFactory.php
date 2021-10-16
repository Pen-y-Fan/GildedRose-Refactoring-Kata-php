<?php

declare(strict_types=1);

namespace GildedRose;

class ProductFactory
{
    private const AGED_BRIE = 'Aged Brie';

    private const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';

    private const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';

    private const CONJURED_MANA_CAKE = 'Conjured Mana Cake';

    public function create(Item $item): ProductInterface
    {
        return match (true) {
            $item->name === self::AGED_BRIE                                   => new AgedBrie($item),
            $item->name === self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT => new BackstagePassesToATafkal80EtcConcert($item),
            $item->name === self::SULFURAS_HAND_OF_RAGNAROS                   => new SulfurasHandOfRagnaros($item),
            $item->name === self::CONJURED_MANA_CAKE                          => new ConjuredManaCake($item),
            default                                                           => new StandardItem($item),
        };
    }
}
