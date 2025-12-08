# Laravel test suite

## Installation

    composer require henrotaym/laravel-test-suite

## Configuration

Your TestCase should use this trait :

    Henrotaym\LaravelTestSuite\TestSuite

## Functionalities

### Mocking
    /**
	* Mocking given element.
	* 
	* @param  string $element Element to mock
	* @return  MockInterface
	*/
	protected  function  mockThis(string  $element,  bool  $is_partial  = false):  MockInterface

### Getting private property
	/**
     * Getting private property value from given instance.
     * 
     * @param string $property Property we're trying to access to.
     * @param mixed $instance Instance where we access property.
     * @return mixed Property value.
     */
    protected function getPrivateProperty(string $property, $instance);

### Setting private property
    /**
     * Setting private property value in given instance.
     * 
     * @param string $property Property we're trying to access to.
     * @param mixed $value Value to set.
     * @param mixed $instance Instance where we set value.
     * @return mixed Instance in order to chain potential calls.
     */
    protected function setPrivateProperty(string $property, $value, $instance);

### Calling private method
    /**
     * Calling private method from given instance.
     * 
     * @param string $method Method we're trying to access to.
     * @param mixed $instance Instance where we access method.
     * @param mixed $parameters Arguments to give to method.
     * @return mixed Method return value.
     */
    protected function callPrivateMethod(string $method, $instance, ...$parameters);

### Mocking Carbon now helper
    /**
     * Mocking Carbon now helper.
     * 
     * @param Carbon $now Expected time returned when calling now().
     * @return static
     */
    public function mockCarbonNow(Carbon $now)