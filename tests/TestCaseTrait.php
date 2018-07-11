<?php

namespace Tests\Unit;

trait TestCaseTrait
{
    /**
     * @var ORMExecutor
     */
    private $_fixtureExecutor;
    private $fixtureLoader;
    /**
     * Adds a new fixture to be loaded.
     *
     * @param FixtureInterface $fixture
     */
    protected function _addFixture(FixtureInterface $fixture)
    {
        $this->_getFixtureLoader()->addFixture($fixture);
    }

    /**
     * Executes all the fixtures that have been loaded so far.
     */
    protected function _executeFixtures()
    {
        $this->_getFixtureExecutor()->execute($this->_getFixtureLoader()->getFixtures());
    }

    /**
     * @return ORMExecutor
     */
    private function _getFixtureExecutor()
    {
        if (!$this->_fixtureExecutor) {
            /** @var \Doctrine\ORM\EntityManager $entityManager */
            $entityManager = self::$kernel->getContainer()->get('doctrine')->getManager();
            $this->_fixtureExecutor = new ORMExecutor($entityManager, new ORMPurger($entityManager));
        }
        return $this->_fixtureExecutor;
    }

    /**
     * @return ContainerAwareLoader
     */
    protected function _getFixtureLoader()
    {
        if (!$this->fixtureLoader) {
            $this->fixtureLoader = new ContainerAwareLoader(self::$kernel->getContainer());
        }
        return $this->fixtureLoader;
    }

    protected static function _callMethod($objectOrClassName, $methodName, $args = null)
    {
        $isStatic = is_string($objectOrClassName);

        if (!$isStatic) {
            if (!is_object($objectOrClassName)) {
                throw new \Exception('Method call on non existent object or class');
            }
        }

        $class = $isStatic ? $objectOrClassName : get_class($objectOrClassName);
        $object = $isStatic ? null : $objectOrClassName;

        $reflectionClass = new \ReflectionClass($class);
        $method = $reflectionClass->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $args);
    }

    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * Gets the value of an object's protected or private property
     * @param object $object the object to access a property on
     * @param string $propertyName name of the property
     * @return mixed property's value
     */
    public static function getValue($object, $propertyName)
    {
        $reflectionClass = new \ReflectionClass(get_class($object));
        $property = $reflectionClass->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    /**
     * Sets the value of an object's protected or private property
     * @param object $object the object to access a property on
     * @param string $propertyName name of the property
     * @param mixed $value the value to set the object's protected or private property
     */
    public static function setValue($object, $propertyName, $value)
    {
        $reflectionClass = new \ReflectionClass(get_class($object));
        $property = $reflectionClass->getProperty($propertyName);
        $property->setAccessible(true);

        $property->setValue($object, $value);
    }

    /**
     * Calls an object method even if it is protected or private
     * @param Object $object the object to call a method on
     * @param string $methodName the method name to be called
     * @param mixed $args 0 or more arguments passed in the function
     * @return mixed returns what the object's method call will return
     */
    public static function call($object, $methodName, $args = null)
    {
        $args = func_get_args();
        array_shift($args);
        array_shift($args);
        return self::_callMethod($object, $methodName, $args);
    }

    public function mockExpects($mock, $method, $returnValue, $timesCalled = 1)
    {
        if ($timesCalled != -1) {
            $mock->expects($this->exactly($timesCalled))->method($method)->will($this->returnValue($returnValue));
        } else {
            $mock->expects($this->any())->method($method)->will($this->returnValue($returnValue));
        }
    }

    public function mockStaticExpects($mockClass, $method, $returnValue, $timesCalled = 1)
    {
        if ($timesCalled != -1) {
            $mockClass::staticExpects($this->exactly($timesCalled))->method($method)->will($this->returnValue($returnValue));
        } else {
            $mockClass::staticExpects($this->any())->method($method)->will($this->returnValue($returnValue));
        }
    }

    protected function _getMock($className, $methodsToMock)
    {
        $mock = $this->createMock($className);
        foreach ($methodsToMock as $methodToMoc => $returnValue) {
            $mock->expects($this->any())
                ->method($methodToMoc)
                ->will($this->returnValue($returnValue));
        }
        return $mock;
    }
}