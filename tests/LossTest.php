<?php

namespace Calc\Tests;

use PHPUnit\Framework\TestCase;
use Calc\ResaleCalculator;

class LossTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     * @param  int[]  $input
     * @param  int  $result
     */
    public function testCalcLoss(array $input, int $result): void
    {
        $calc = new ResaleCalculator();
        $this->assertEquals($result, $calc->calculateLowestLoss($input));
    }

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        $long = [];
        for ($i = 0; $i < 1000; $i += 1) {
            $long[] = $i + 10;
        }
        $shuffled = $long;
        shuffle($shuffled);
        return [
            [[210, 130, 50, 175, 100], 30],
            [[210, 130, 50, 175, 80], 35],
            [[1000], 1000],
            [[10, 20, 30, 40, 50, 60, 70, 80], 10],
            [[30, 40, 50, 70, 70, 60, 20], 10],
            [$long, 10],
            [$shuffled, 1]
        ];
    }
}
