<?php

namespace App\Tests;

use App\Service\MessageGenerator;
use App\Service\Text;
use PHPUnit\Framework\TestCase;

class MessageGeneratorTest extends TestCase
{
    private MessageGenerator $generator;
    private array $messages;
    protected function setUp(): void
    {
        $this->generator = new MessageGenerator(new Text());

        $this->messages =  [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];
    }

    public function testMessage(): void
    {
        $message = $this->generator->getHappyMessage();
        $this->assertContains($message, $this->messages);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // quelque

    }
}
