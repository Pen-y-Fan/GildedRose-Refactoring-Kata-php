<?php

declare(strict_types=1);

namespace GildedRose;

class SulfurasHandOfRagnaros implements ProductInterface
{
    public function __construct(
        private Item $item
    ) {
    }

    public function update(): void
    {
        // never changes.
    }
}
