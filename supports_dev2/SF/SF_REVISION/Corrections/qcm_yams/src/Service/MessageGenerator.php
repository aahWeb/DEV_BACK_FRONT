<?php
// src/Service/MessageGenerator.php
namespace App\Service;

class MessageGenerator
{
    private array $messages ;
    public function __construct(Text $text)
    {
        $this->messages = $text->getMessages();
    }
    public function getHappyMessage(): string
    {
        $index = array_rand($this->messages);

        return $this->messages[$index];
    }
}
