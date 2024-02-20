<?php
// src/Document/Product.php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\EmbeddedDocument]
class Calories
{
   
    #[MongoDB\Field(type: 'float')]
    protected $total;

    #[MongoDB\Field(type : "float")]
    protected $perServing;


    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     */
    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of perServing
     */
    public function getPerServing()
    {
        return $this->perServing;
    }

    /**
     * Set the value of perServing
     */
    public function setPerServing($perServing): self
    {
        $this->perServing = $perServing;

        return $this;
    }
}