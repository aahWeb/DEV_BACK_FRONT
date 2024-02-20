<?php

use PHPUnit\Framework\TestCase;
use App\Services\Message;

class MessageTest extends TestCase{

    protected Message $message;


    public function setUp():void{
        // avant chaque test le setUp s'execute
        $this->message = new Message('en');
    }

    // un test
    public function testEn(){

        // assertion phpunit qui vérifie un algo 
        $this->assertSame("Hello World!",$this->message->get());
    }

    public function testFr(){

        $this->message->setLang('fr');
        // assertion phpunit qui vérifie un algo 
        $this->assertSame("Bonjour tout le monde!",$this->message->get());
    }
}