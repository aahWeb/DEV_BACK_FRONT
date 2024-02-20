<?php
// src/Document/Product.php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\EmbeddedDocument]
class Origin
{
   
    #[MongoDB\Field(type: 'string')]
    protected $country;

    #[MongoDB\Field(type : "string")]
    protected $region;

    /**
     * Get the value of country
     */
    public function getCountry():string
    {
        return $this->country;
    }

    /**
     * Set the value of country
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of region
     */
    public function getRegion():string
    {
        return $this->region;
    }

    /**
     * Set the value of region
     */
    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }
}