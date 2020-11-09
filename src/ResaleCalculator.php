<?php

namespace Calc;

class ResaleCalculator
{
    /**
     * @param  int[] $prices
     * @return int
     */
    public function calculateLowestLoss(array $prices): int
    {
        $lowest = min($prices) ?: 0;
        $days = array_keys($prices);
        $lowest = array_reduce($days, function ($acc, $day) use ($prices) {
            $buyPrice = $prices[$day];
            $otherDays = array_slice($prices, $day + 1);
            return array_reduce($otherDays, function ($low, $dayPrice) use ($buyPrice) {
                $diff = $buyPrice - $dayPrice;
                return ($buyPrice > $dayPrice && $diff < $low) ? $diff : $low;
            }, $acc);
        }, $lowest);

        return $lowest;
    }
}
