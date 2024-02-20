<?php

namespace App\Repository;

use App\Document\Pastry;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;

class PastryRepository extends ServiceDocumentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pastry::class);
    }

    public function get()
    {
    }
    public function aggregateTotalByCountry()
    {
        $builder = $this->createAggregationBuilder();

        return $builder
            ->group()
            ->field('_id')
            ->expression('$origin.country')
            ->field('total')->sum(1)
            ->getAggregation();
    }
}
