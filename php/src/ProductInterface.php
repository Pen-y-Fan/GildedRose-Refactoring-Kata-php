<?php

declare(strict_types=1);

namespace GildedRose;

interface ProductInterface
{
    public function __construct(Item $item);

    public function update(): void;
}
