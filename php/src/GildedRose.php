<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\products\AbstractProduct;
use GildedRose\products\ProductFactory;
use SplObjectStorage;

final class GildedRose
{
    /**
     * @var SplObjectStorage
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = new SplObjectStorage();
        $factory = new ProductFactory();
        foreach ($items as $item) {
            $this->items->attach($factory->create($item));
        }
    }

    public function updateQuality(): void
    {
        /** @var AbstractProduct $item */
        foreach ($this->items as $item) {
            $item->update();
        }
    }
}
