<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vit
 * Date: 28.10.13
 * Time: 22:12
 * To change this template use File | Settings | File Templates.
 */

namespace Vit\GuestBookBundle\Tests;


class CommenterTest extends \PHPUnit_Framework_TestCase
{
//    public function provider()
//    {
//        return array(
//            array(0, 0, 0),
//            array(0, 1, 1),
//            array(1, 0, 1),
//        );
//    }

    /**
     * @ dataProvider provider
     */
//    public function testAdd($a, $b, $c)
//    {
//        $this->assertEquals($c, $a + $b);
//    }

    public function calcData()
    {
        return array(
            array(array(1, 3), 4),
            array(array(5, 5), 10),
            array(array(3, 9), 12),
            array(array(4, 3), 7),
            array(array(0, -1), -1),
        );
    }

    /**
     * @dataProvider calcData
     */
    public function testAdd($data, $result)
    {
        $calcMock = $this->getMockBuilder('Vit\GuestBookBundle\Commenter')
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock()
        ;

        $this->assertEquals($result, $calcMock->add($data[0], $data[1]));
    }
}