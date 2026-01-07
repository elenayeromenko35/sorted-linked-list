<?php

declare(strict_types=1);

namespace Ba\SortedLinkedList\Entity;

/**
 * List item.
 */
class ListEntity
{
    /**
     * @param int|string $value
     * @param ListEntity|null $next
     */
    public function __construct(
        public int|string $value,
        public ?ListEntity $next = null
    ) {}
}