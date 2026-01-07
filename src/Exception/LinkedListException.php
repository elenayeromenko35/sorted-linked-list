<?php

declare(strict_types=1);

namespace Ba\SortedLinkedList\Exception;

/**
 * Exception for all SortedLinkedList errors.
 *
 * Thrown when:
 *  - an unsupported value type is inserted (not int or string);
 *  - an attempt is made to mix different value types in the same list.
 */
class LinkedListException extends \LogicException {}
