<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Pastry
{
    #[MongoDB\Id]
    protected string $_id;

    #[MongoDB\Field(type: 'string')]
    protected string $name;

    #[MongoDB\EmbedOne(targetDocument:Origin::class)]
    protected $origin;

    #[MongoDB\EmbedOne(targetDocument:Calories::class)]
    protected $calories;

    public function setName(string $name){
        $this->name = $name;
    }

    public function getId(): string{

        return $this->_id;
    }

    public function getName(): string{

        return $this->name;
    }

    public function setCalories(Calories $calories): void
    {
        $this->calories = $calories;
    }

    public function getCalories(): Calories
    {
        return $this->calories ;
    }

}