<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;

test('Dexterity Vest', function ($assertion, $expected) {
    $items = [new Item($assertion[0], $assertion[1], $assertion[2])];

    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();

    expect(
        value: $items[0]->name
    )->toBe(
        expected: $expected[0]
    );

    expect(
        value: $items[0]->sell_in
    )->toBe(
        expected: $expected[1]
    );

    expect(
        value: $items[0]->quality
    )->toBe(
        expected: $expected[2]
    );
})->with(
    function () {
        yield '+5 Dexterity Vest day 20 reduces at x1 rate' => [['+5 Dexterity Vest', 10, 20], ['+5 Dexterity Vest', 9, 19]];
        yield '+5 Dexterity Vest day 19 reduces at x1 rate' => [['+5 Dexterity Vest', 9, 19], ['+5 Dexterity Vest', 8, 18]];
        yield '+5 Dexterity Vest sell_in 1 reduces at x1 rate' => [['+5 Dexterity Vest', 1, 11], ['+5 Dexterity Vest', 0, 10]];
        yield '+5 Dexterity Vest sell_in 0 reduces at x2 rate' => [['+5 Dexterity Vest', 0, 10], ['+5 Dexterity Vest', -1, 8]];
        yield '+5 Dexterity Vest sell_in -1 reduces at x2 rate' => [['+5 Dexterity Vest', -1, 8], ['+5 Dexterity Vest', -2, 6]];
        yield '+5 Dexterity Vest sell_in -2 reduces at x2 rate' => [['+5 Dexterity Vest', -2, 6], ['+5 Dexterity Vest', -3, 4]];
        yield '+5 Dexterity Vest sell_in -3 reduces at x2 rate' => [['+5 Dexterity Vest', -3, 4], ['+5 Dexterity Vest', -4, 2]];
        yield '+5 Dexterity Vest sell_in -4 reaches 0' => [['+5 Dexterity Vest', -4, 2], ['+5 Dexterity Vest', -5, 0]];
        yield '+5 Dexterity Vest sell_in -5 remains 0' => [['+5 Dexterity Vest', -5, 0], ['+5 Dexterity Vest', -6, 0]];
    }
);

test('Aged Brie', function ($assertion, $expected) {
    $items = [new Item($assertion[0], $assertion[1], $assertion[2])];

    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();

    expect(
        value: $items[0]->name
    )->toBe(
        expected: $expected[0]
    );

    expect(
        value: $items[0]->sell_in
    )->toBe(
        expected: $expected[1]
    );

    expect(
        value: $items[0]->quality
    )->toBe(
        expected: $expected[2]
    );
})->with(
    function () {
        yield 'Aged Brie day 1 increases x1' => [['Aged Brie', 2, 0], ['Aged Brie', 1, 1]];
        yield 'Aged Brie day 2 increases x1' => [['Aged Brie', 1, 1], ['Aged Brie', 0, 2]];
        yield 'Aged Brie day 3 increases x2 when sell_in is below 0' => [['Aged Brie', 0, 2], ['Aged Brie', -1, 4]];
        yield 'Aged Brie day 4 increases x2 when sell_in is below 0' => [['Aged Brie', -1, 4], ['Aged Brie', -2, 6]];
    }
);


// Elixir of the Mongoose
test('Elixir of the Mongoose', function ($assertion, $expected) {
    $items = [new Item($assertion[0], $assertion[1], $assertion[2])];

    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();

    expect(
        value: $items[0]->name
    )->toBe(
        expected: $expected[0]
    );

    expect(
        value: $items[0]->sell_in
    )->toBe(
        expected: $expected[1]
    );

    expect(
        value: $items[0]->quality
    )->toBe(
        expected: $expected[2]
    );
})->with(
    function () {
        yield 'Elixir of the Mongoose day  5' => [['Elixir of the Mongoose', 5, 7], ['Elixir of the Mongoose', 4, 6]];
        yield 'Elixir of the Mongoose day  4' => [['Elixir of the Mongoose', 4, 6], ['Elixir of the Mongoose', 3, 5]];
        yield 'Elixir of the Mongoose day  3' => [['Elixir of the Mongoose', 3, 5], ['Elixir of the Mongoose', 2, 4]];
        yield 'Elixir of the Mongoose day  2' => [['Elixir of the Mongoose', 2, 4], ['Elixir of the Mongoose', 1, 3]];
        yield 'Elixir of the Mongoose day  1 reduces x2 when sell_in reaches 0' => [['Elixir of the Mongoose', 1, 3], ['Elixir of the Mongoose', 0, 2]];
        yield 'Elixir of the Mongoose day  0 reduces x2 when sell_in is below 0' => [['Elixir of the Mongoose', 0, 2], ['Elixir of the Mongoose', -1, 0]];
        yield 'Elixir of the Mongoose day -1 does not reduce more than 0' => [['Elixir of the Mongoose', -1, 0], ['Elixir of the Mongoose', -2, 0]];
    }
);
test('Sulfuras, Hand of Ragnaros', function ($assertion, $expected) {
    $items = [new Item($assertion[0], $assertion[1], $assertion[2])];

    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();

    expect(
        value: $items[0]->name
    )->toBe(
        expected: $expected[0]
    );

    expect(
        value: $items[0]->sell_in
    )->toBe(
        expected: $expected[1]
    );

    expect(
        value: $items[0]->quality
    )->toBe(
        expected: $expected[2]
    );
})->with(
    function () {
        yield 'Sulfuras, Hand of Ragnaros day 5 doesn\'t change' => [['Sulfuras, Hand of Ragnaros', 0, 80], ['Sulfuras, Hand of Ragnaros', 0, 80]];
        yield 'Sulfuras, Hand of Ragnaros day 4 doesn\'t change' => [['Sulfuras, Hand of Ragnaros', 0, 80], ['Sulfuras, Hand of Ragnaros', 0, 80]];
        yield 'Sulfuras, Hand of Ragnaros day 3 doesn\'t change' => [['Sulfuras, Hand of Ragnaros', 0, 80], ['Sulfuras, Hand of Ragnaros', 0, 80]];
    }
);

test('Backstage passes to a TAFKAL80ETC concert', function ($assertion, $expected) {
    $items = [new Item($assertion[0], $assertion[1], $assertion[2])];

    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();

    expect(
        value: $items[0]->name
    )->toBe(
        expected: $expected[0]
    );

    expect(
        value: $items[0]->sell_in
    )->toBe(
        expected: $expected[1]
    );

    expect(
        value: $items[0]->quality
    )->toBe(
        expected: $expected[2]
    );
})->with(
    function () {
        yield 'Backstage passes to a TAFKAL80ETC concert 11 increases x1' => [['Backstage passes to a TAFKAL80ETC concert', 11, 24], ['Backstage passes to a TAFKAL80ETC concert', 10, 25]];
        yield 'Backstage passes to a TAFKAL80ETC concert 10 increases x2' => [['Backstage passes to a TAFKAL80ETC concert', 10, 25], ['Backstage passes to a TAFKAL80ETC concert', 9, 27]];
        yield 'Backstage passes to a TAFKAL80ETC concert 9 increases x2' => [['Backstage passes to a TAFKAL80ETC concert', 9, 27], ['Backstage passes to a TAFKAL80ETC concert', 8, 29]];
        yield 'Backstage passes to a TAFKAL80ETC concert 8 increases x2' => [['Backstage passes to a TAFKAL80ETC concert', 8, 29], ['Backstage passes to a TAFKAL80ETC concert', 7, 31]];
        yield 'Backstage passes to a TAFKAL80ETC concert 7 increases x2' => [['Backstage passes to a TAFKAL80ETC concert', 7, 31], ['Backstage passes to a TAFKAL80ETC concert', 6, 33]];
        yield 'Backstage passes to a TAFKAL80ETC concert 6 increases x3' => [['Backstage passes to a TAFKAL80ETC concert', 6, 33], ['Backstage passes to a TAFKAL80ETC concert', 5, 35]];
        yield 'Backstage passes to a TAFKAL80ETC concert 5 increases x3' => [['Backstage passes to a TAFKAL80ETC concert', 5, 35], ['Backstage passes to a TAFKAL80ETC concert', 4, 38]];
        yield 'Backstage passes to a TAFKAL80ETC concert 4 increases x3' => [['Backstage passes to a TAFKAL80ETC concert', 4, 38], ['Backstage passes to a TAFKAL80ETC concert', 3, 41]];
        yield 'Backstage passes to a TAFKAL80ETC concert 3 increases x3' => [['Backstage passes to a TAFKAL80ETC concert', 3, 41], ['Backstage passes to a TAFKAL80ETC concert', 2, 44]];
        yield 'Backstage passes to a TAFKAL80ETC concert 2 increases x3' => [['Backstage passes to a TAFKAL80ETC concert', 2, 44], ['Backstage passes to a TAFKAL80ETC concert', 1, 47]];
        yield 'Backstage passes to a TAFKAL80ETC concert 1 increases x3' => [['Backstage passes to a TAFKAL80ETC concert', 1, 47], ['Backstage passes to a TAFKAL80ETC concert', 0, 50]];
        yield 'Backstage passes to a TAFKAL80ETC concert 0 reduces to 0' => [['Backstage passes to a TAFKAL80ETC concert', 0, 50], ['Backstage passes to a TAFKAL80ETC concert', -1, 0]];
        yield 'Backstage passes to a TAFKAL80ETC concert -1 reduces to 0' => [['Backstage passes to a TAFKAL80ETC concert', -1, 0], ['Backstage passes to a TAFKAL80ETC concert', -2, 0]];
    }
);

test('Conjured Mana Cake', function ($assertion, $expected) {
    $items = [new Item($assertion[0], $assertion[1], $assertion[2])];

    $gildedRose = new GildedRose($items);
    $gildedRose->updateQuality();

    expect(
        value: $items[0]->name
    )->toBe(
        expected: $expected[0]
    );

    expect(
        value: $items[0]->sell_in
    )->toBe(
        expected: $expected[1]
    );

    expect(
        value: $items[0]->quality
    )->toBe(
        expected: $expected[2]
    );
})->with(
    function () {
        yield 'Conjured Mana Cake day 12' => [['Conjured Mana Cake', 12, 6], ['Conjured Mana Cake', 11, 4]];
        yield 'Conjured Mana Cake day 11' => [['Conjured Mana Cake', 11, 5], ['Conjured Mana Cake', 10, 3]];
        yield 'Conjured Mana Cake day 10' => [['Conjured Mana Cake', 10, 4], ['Conjured Mana Cake', 9, 2]];
        yield 'Conjured Mana Cake day 9' => [['Conjured Mana Cake', 9, 3], ['Conjured Mana Cake', 8, 1]];
        yield 'Conjured Mana Cake day 8' => [['Conjured Mana Cake', 8, 2], ['Conjured Mana Cake', 7, 0]];
        yield 'Conjured Mana Cake day 7' => [['Conjured Mana Cake', 7, 1], ['Conjured Mana Cake', 6, 0]];
        yield 'Conjured Mana Cake day 6' => [['Conjured Mana Cake', 6, 0], ['Conjured Mana Cake', 5, 0]];
yield 'Conjured Mana Cake 0 reduces at x4 rate'  =>[ ['Conjured Mana Cake', 0, 16], ['Conjured Mana Cake', -1, 12] ];
yield 'Conjured Mana Cake -1 reduces at x4 rate' => [ ['Conjured Mana Cake', -1, 12], ['Conjured Mana Cake', -2, 8] ];
yield 'Conjured Mana Cake -2 reduces at x4 rate' => [ ['Conjured Mana Cake', -2, 8], ['Conjured Mana Cake', -3, 4] ];
yield 'Conjured Mana Cake -3 reduces at x4 rate' => [ ['Conjured Mana Cake', -3, 4], ['Conjured Mana Cake', -4, 0] ];
yield 'Conjured Mana Cake -4 reduces at x4 rate' => [ ['Conjured Mana Cake', -4, 0], ['Conjured Mana Cake', -5, 0] ];
    }
);

/**





[ ['Conjured Mana Cake', -5, 0],


 */