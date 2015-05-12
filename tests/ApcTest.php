<?php

use Adduc\Memoize\Apc;

class ApcTest extends PHPUnit_Framework_TestCase
{
    const APC_KEY = 'AdducMemoizeApcTest';
    const MOCK_METHOD = 'expensive_method';
        
    public function testCacheFail()
    {
        apc_delete(static::APC_KEY);
        
        $mock = $this->getMockBuilder('stdClass')
            ->setMethods(array(static::MOCK_METHOD))
            ->getMock();

        $mock
            ->expects($this->once())
            ->method(static::MOCK_METHOD);

        $apc = new Apc();
        $callable = array($mock, static::MOCK_METHOD);
        $apc->memoizeCallable(static::APC_KEY, $callable);
    }
    
    public function testCacheHit()
    {
        $expected = 'a';
        apc_store(static::APC_KEY, $expected);

        $mock = $this->getMockBuilder('stdClass')
            ->setMethods(array(static::MOCK_METHOD))
            ->getMock();
        
        $mock
            ->expects($this->never())
            ->method(static::MOCK_METHOD);

        $apc = new Apc();
        $callable = array($mock, static::MOCK_METHOD);
        $result = $apc->memoizeCallable(static::APC_KEY, $callable);        
        $this->assertEquals($expected, $result);
    }    
}
