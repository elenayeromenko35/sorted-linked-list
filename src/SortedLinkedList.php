<?php

declare(strict_types=1);

namespace Ba\SortedLinkedList;

use Ba\SortedLinkedList\Exception\LinkedListException;
use Ba\SortedLinkedList\Entity\ListEntity;

/**
 * A sorted linked list
 */
class SortedLinkedList
{
    /**
     * @var ListEntity|null
     */
    private ?ListEntity $head = null;

    /**
     * @var 'integer'|'string'|null
     */
    private ?string $type = null;

    /**
     * Inserts a value into the list keeping it sorted.
     *
     * The list accepts either integers or strings, but not both.
     * The value type is fixed on the first insertion.
     *
     * @param int|string $value Value to insert.
     * @throws LinkedListException
     */
    public function insert(int|string $value): void
    {
        $this->supportedTypeValidation($value);
        $this->sameTypeValidation($value);

        $listEntity = new ListEntity($value);

        if ($this->head === null || $this->compare($value, $this->head->value) < 0) {
            $listEntity->next = $this->head;
            $this->head = $listEntity;
            return;
        }

        $current = $this->head;

        while ($current->next !== null && $this->compare($value, $current->next->value) > 0) {
            $current = $current->next;
        }

        $listEntity->next = $current->next;
        $current->next = $listEntity;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        $current = $this->head;

        while ($current !== null) {
            $result[] = $current->value;
            $current = $current->next;
        }

        return $result;
    }

    /**
     * Ensures the value is of a supported type
     *
     * @param int|string $value
     * @return void
     * @throws LinkedListException
     */
    private function supportedTypeValidation(int|string $value): void
    {
        if (!is_int($value) && !is_string($value)) {
            throw new LinkedListException('Only int or string values are supported.');
        }
    }

    /**
     * Ensures that all values in the list share the same type.
     *
     * @param int|string $value
     * @return void
     * @throws LinkedListException
     */
    private function sameTypeValidation(int|string $value): void
    {
        if ($this->type === null) {
            $this->type = gettype($value);
            return;
        }

        if ($this->type !== gettype($value)) {
            throw new LinkedListException(sprintf('This list accepts only %s values.', $this->type));
        }
    }

    /**
     * @param int|string $a
     * @param int|string $b
     * @return int
     */
    private function compare(int|string $a, int|string $b): int
    {
        return is_int($a) ? $a <=> $b : strcmp($a, $b);
    }
}