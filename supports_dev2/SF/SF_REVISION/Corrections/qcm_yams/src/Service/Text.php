<?php
// src/Service/MessageGenerator.php
namespace App\Service;

class Text
{

    private array $messages = [
        'You did it! You updated the system! Amazing!',
        'That was one of the coolest updates I\'ve seen all day!',
        'Great work! Keep going!',
    ];

    public function getMessages(): array
    {

        return $this->messages;
    }
}