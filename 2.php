<?php

/**
 * Class ListNode
 */
class ListNode
{
    public int $val = 0;
    public ?ListNode $next = null;

    public function __construct(int $val = 0, ListNode $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * Class Solution
 */
class Solution {
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode {

        /*
            time complexity: 0(m + n)

            1. set two pointers, one for each input list. Create head of new list

            2. add values that our pointers are at

            3. check if theres a carry, add 1

            4. check if sum > 10. if it is, mod it and set carry flag = true

            5. move pointers forward

            6. after loop, check if carry is true. if it is, add additional node to result list

            7. return result list

            |

            (2 -> 4 -> 3

            (5 -> 6 -> 8

            7 -> 0 -> 1 -> 1

            1
            342
            465
            807
        */

        $result_head = new ListNode();
        $result_iterator = $result_head;

        $p1 = $l1;
        $p2 = $l2;
        $carry = false;

        while ($p1 !== null || $p2 !== null) {
            $sum = 0;

            if ($p1 !== null) {
                $sum += $p1->val;
                $p1 = $p1->next;
            }

            if ($p2 !== null) {
                $sum += $p2->val;
                $p2 = $p2->next;
            }

            if ($carry) {
                $sum++;
            }

            if ($sum >= 10) {
                $sum %= 10;
                $carry = true;
            } else {
                $carry = false;
            }

            $result_iterator->next = new ListNode($sum);
            $result_iterator = $result_iterator->next;
        }

        if ($carry) {
            $result_iterator->next = new ListNode(1);
        }

        return $result_head->next;

    }

    /**
     * @param array $array
     * @return ListNode|null
     */
    public function fillListNode(array $array): ?ListNode {
        $listNode = null;
        for ($i = 0; $i < count($array); $i++) {
            if (!isset($listNode)) {
                $listNode = new ListNode($array[$i]);
            } else {
                $tmp = $listNode;

                while (isset($tmp->next)) {
                    $tmp = $tmp->next;
                }

                $tmp->next = new ListNode($array[$i]);
            }
        }

        return $listNode;
    }
}
$fn = new Solution();

$l1 = $fn->fillListNode([2,4,3]);
$l2 = $fn->fillListNode([5,6,4]);

$fn->addTwoNumbers($l1, $l2);