<?php

namespace Calc\Tests;

use PHPUnit\Framework\TestCase;
use Calc\ResaleCalculator;

class LossTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testCalcLoss($input, $result)
    {
        $calc = new ResaleCalculator();
        $this->assertEquals($result, $calc->calculateLowestLoss($input));
    }

    public function dataProvider()
    {
        return [
            [[210, 130, 50, 175, 100], 30],
            [[210, 130, 50, 175, 80], 45],
        ];
    }
}
