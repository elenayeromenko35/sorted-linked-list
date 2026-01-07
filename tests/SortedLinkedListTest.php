<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use BA\SortedLinkedList\SortedLinkedList;
use BA\SortedLinkedList\Exception\LinkedListException;

final class SortedLinkedListTest extends TestCase
{
    public function testIntSorting(): void
    {
        $list = new SortedLinkedList();
        $list->insert(3);
        $list->insert(1);
        $list->insert(2);

        $this->assertSame([1, 2, 3], $list->toArray());
    }

    public function testStringSorting(): void
    {
        $list = new SortedLinkedList();
        $list->insert('b');
        $list->insert('a');

        $this->assertSame(['a', 'b'], $list->toArray());
    }

    public function testMixedTypesThrowsException(): void
    {
        $this->expectException(LinkedListException::class);

        $list = new SortedLinkedList();
        $list->insert(1);
        $list->insert('a');
    }

    public function testSingleElement(): void
    {
        $list = new SortedLinkedList();
        $list->insert(5);

        $this->assertSame([5], $list->toArray());
    }
}
