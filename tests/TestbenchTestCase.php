<?php

namespace Avexsoft\FilamentDonkey\Tests;

use Orchestra\Testbench\TestCase as Testbench;

abstract class TestbenchTestCase extends Testbench
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app): array
    {
        return [
            \Avexsoft\FilamentDonkey\FilamentDonkeyServiceProvider::class,
        ];
    }
}
