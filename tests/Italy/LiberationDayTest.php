<?php
/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2018 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Yasumi\tests\Italy;

use DateTime;
use DateTimeZone;
use Yasumi\Holiday;
use Yasumi\tests\YasumiTestCaseInterface;

/**
 * Class containing tests for Liberation Day in Italy.
 *
 * Italy's Liberation Day (Festa della Liberazione), also known as the Anniversary of the Liberation
 * (Anniversario della liberazione d'Italia), Anniversary of the Resistance (anniversario della Resistenza), or simply
 * April 25 is a national Italian holiday commemorating the end of the second world war and the end of Nazi occupation
 * of the country. On May 27, 1949, bill 260 made the anniversary a permanent, annual national holiday.
 *
 * @link http://en.wikipedia.org/wiki/Liberation_Day_%28Italy%29
 */
class LiberationDayTest extends ItalyBaseTestCase implements YasumiTestCaseInterface
{
    /**
     * The name of the holiday
     */
    const HOLIDAY = 'liberationDay';

    /**
     * The year in which the holiday was first established
     */
    const ESTABLISHMENT_YEAR = 1949;

    /**
     * Tests Liberation Day on or after 1949.
     */
    public function testLiberationDayOnAfter1949()
    {
        $year = $this->generateRandomYear(self::ESTABLISHMENT_YEAR);
        $this->assertHoliday(
            self::REGION,
            self::HOLIDAY,
            $year,
            new DateTime("$year-4-25", new DateTimeZone(self::TIMEZONE))
        );
    }

    /**
     * Tests Liberation Day before 1949.
     */
    public function testLiberationDayBefore1949()
    {
        $this->assertNotHoliday(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(1000, self::ESTABLISHMENT_YEAR - 1)
        );
    }

    /**
     * Tests translated name of Liberation Day.
     */
    public function testTranslation()
    {
        $this->assertTranslatedHolidayName(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(self::ESTABLISHMENT_YEAR),
            [self::LOCALE => 'Festa della Liberazione']
        );
    }

    /**
     * Tests type of the holiday defined in this test.
     */
    public function testHolidayType()
    {
        $this->assertHolidayType(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(self::ESTABLISHMENT_YEAR),
            Holiday::TYPE_OFFICIAL
        );
    }
}
