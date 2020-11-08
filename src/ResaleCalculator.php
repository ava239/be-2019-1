<?php

namespace Calc;

class ResaleCalculator
{
    public function calculateLowestLoss(array $prices): int
    {
        $lowest = max($prices);
        foreach ($prices as $buyDay => $buyPrice) {
            for ($i = $buyDay + 1; $i < count($prices); $i += 1) {
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
