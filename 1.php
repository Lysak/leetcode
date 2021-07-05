<?php
    /**
     * @param Integer[] $nums
     * @param Integer   $target
     * @return Integer[]
     */
    function twoSum(array $nums, int $target): array
    {
        $result = $map = [];

        $len = count($nums);

        for ($i = 0; $i < $len; $i++) {
            $difference = $target - $nums[$i];
            if (isset($map[$difference])) {
                $result[0] = $i;
                $result[1] = $map[$difference]-1;
                return $result;
            }
            $map[$nums[$i]] = $i+1;
        }

        return $result;
    }