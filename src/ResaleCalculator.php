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
        $lowest = max($prices) ?: 0;
        foreach ($prices as $buyDay => $buyPrice) {
            for ($i = $buyDay + 1, $days = count($prices); $i < $days; $i += 1) {
                $diff = $buyPrice - $prices[$i];
                if ($buyPrice > $prices[$i] && $diff < $lowest) {
                    $lowest = $diff;
                }
                if ($buyPrice < $lowest) {
                    $lowest = $buyPrice;
                }
            }
        }

        return $lowest;
    }
}
