<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var ProductInterface[]
     */
    private array $items = [];

    /**
     * @param Item[] $items
     */
    public function __construct(array $items)
    {
        $productFactory = new ProductFactory();
        foreach ($items as $item) {
            $this->items[] = $productFactory->create($item);
        }
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $item->update();
        }
    }
}
