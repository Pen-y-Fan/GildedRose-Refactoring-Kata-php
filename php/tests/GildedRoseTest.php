<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testConjuredManaCakeQualityReducesTwiceNormalRate(): void
    {
        $items = [new Item('Normal', 10, 5), new Item('Conjured Mana Cake', 10, 5)];
        $gildedRose = new GildedRose($items);
        $this->assertSame('Normal', $items[0]->name);
        $this->assertSame('Conjured Mana Cake', $items[1]->name);

        $this->assertSame(10, $items[0]->sell_in);
        $this->assertSame(10, $items[1]->sell_in);

        $this->assertSame(5, $items[0]->quality);
        $this->assertSame(5, $items[1]->quality);

        $gildedRose->updateQuality();
        $this->assertSame(4, $items[0]->quality);
        $this->assertSame(3, $items[1]->quality);

        $gildedRose->updateQuality();
        $this->assertSame(3, $items[0]->quality);
        $this->assertSame(1, $items[1]->quality);

        $gildedRose->updateQuality();
        $this->assertSame(2, $items[0]->quality);
        $this->assertSame(0, $items[1]->quality);
    }
}
