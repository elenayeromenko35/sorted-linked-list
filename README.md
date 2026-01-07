# Sorted Linked List

### Overview
A PHP library providing a sorted linked list.
The list keeps values sorted on insertion and supports either `int` or `string` values, but not both.

### Usage

```
$list = new SortedLinkedList();
$list->insert(3);
$list->insert(1);

$data = $list->toArray();
