<?php

namespace Sushant\NepaliPhoneValidation\Tests;

use Orchestra\Testbench\TestCase;
use Sushant\NepaliPhoneValidation\NepaliPhoneValidationServiceProvider;
use Sushant\NepaliPhoneValidation\Rules\NepaliPhone;

class NepaliPhoneTest extends TestCase
{
    const VALID_NUMBERS = [
        '9841234567',
        '9851234567',
        '9861234567',
        '9801234567',
        '9811234567',
        '9821234567',
        '9611234567',
        '9881234567',
        '9721234567',
        '+9779841234567',
        '+977-9801234567',
        '09841234567',
        '9779851234567',
    ];

    const INVALID_NUMBERS = [
        '9871234567',
        '984123456',
        '98412345678',
        '014123456',
        '1234567890',
        '+9779871234567',
        '009771231234',
        '98abcdefgh',
    ];

    protected function getPackageProviders($app)
    {
        return [
            NepaliPhoneValidationServiceProvider::class,
        ];
    }

    public function testValidNepaliPhoneNumbers()
    {
        $rule = new NepaliPhone();

        foreach (self::VALID_NUMBERS as $number) {
            $rule->validate('phone', $number, function () use ($number) {
                $this->assertTrue(false, sprintf("Phone number is not valid only: %s", $number));
            });
        }

        $this->assertTrue(true);
    }

    public function testInvalidNepaliPhoneNumbers()
    {
        $rule = new NepaliPhone();
        $timesFailed = 0;

        foreach (self::INVALID_NUMBERS as $number) {
            $rule->validate('phone', $number, function () use (&$timesFailed) {
                $timesFailed++;
            });
        }

        $this->assertEquals(count(self::INVALID_NUMBERS), $timesFailed, 'All numbers must fail validation');
    }
}
