<?php
include_once __DIR__.'/../../../index.php';

class ClientsPresenterTest extends PHPUnit_Framework_TestCase 
{
    
    protected $clientsPresenter;
    
    protected function setUp()
    {
        $this->clientsPresenter = $this->getMock('ClientsPresenter',array('getLimit'),array(Nette\Environment::getContext()));
        $this->clientsPresenter->expects($this->any())
             ->method('getLimit')
             ->will($this->returnValue('foo'));
        //$this->clientsPresenter->getUser()->login('demo', 'demo');
        $request = new Nette\Application\Request('Homepage', 'GET', array());
        $response = $this->clientsPresenter->run($request);
    }
    public function testStartup () {
        $this->assertEquals('foo',$this->clientsPresenter->getLimit());
        $this->assertEquals('bar',$this->clientsPresenter->getLimit2());
    }
}