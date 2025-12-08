<?php
namespace Henrotaym\LaravelTestSuite;

use Mockery;
use Carbon\Carbon;
use Mockery\MockInterface;

trait TestSuite
{
    /**
     * Mocking given element.
     * 
     * @param string $element Element to mock
     * @return MockInterface
     */

    public function mockThis(string $element, bool $is_partial = false, array $deps = null): MockInterface
    {
        /** @var MockInterface */
        $mock = $deps
            ? Mockery::mock($element, $deps)
            : Mockery::mock($element);

        $mock->shouldAllowMockingProtectedMethods();

        if ($is_partial):
            $mock->makePartial();
        endif;
        
        $this->app->singleton($element, function($app) use ($mock) {
            return $mock;
        });

        return $mock;
    }

    /**
     * Getting private property value from given instance.
     * 
     * @param string $property Property we're trying to access to.
     * @param mixed $instance Instance where we access property.
     * @return mixed Property value.
     */
    public function getPrivateProperty(string $property, $instance)
    {
        $property = new \ReflectionProperty($instance, $property);
        $property->setAccessible(true);

        return $property->getValue($instance);
    }

    /**
     * Setting private property value in given instance.
     * 
     * @param string $property Property we're trying to access to.
     * @param mixed $value Value to set.
     * @param mixed $instance Instance where we set value.
     * @return mixed Instance in order to chain potential calls.
     */
    public function setPrivateProperty(string $property, $value, $instance)
    {
        $property = new \ReflectionProperty($instance, $property);
        $property->setAccessible(true);
        $property->setValue($instance, $value);

        return $instance;
    }

    /**
     * Calling private method from given instance.
     * 
     * @param string $method Method we're trying to access to.
     * @param mixed $instance Instance where we access method.
     * @param mixed $parameters Arguments to give to method.
     * @return mixed Method return value.
     */
    public function callPrivateMethod(string $method, $instance, ...$parameters)
    {
        $method = new \ReflectionMethod($instance, $method);
        $method->setAccessible(true);

        return $method->invokeArgs($instance, $parameters);
    }

    /**
     * Mocking Carbon now helper.
     * 
     * @param Carbon $now Expected time returned when calling now().
     * @return static now() faked value.
     */
    public function mockCarbonNow(Carbon $now)
    {
        Carbon::setTestNow($now);

        return $this;
    }
}