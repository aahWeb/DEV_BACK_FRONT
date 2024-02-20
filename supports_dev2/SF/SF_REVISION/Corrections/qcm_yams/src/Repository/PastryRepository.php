<?php

namespace App\Repository;

use App\Entity\Pastry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @extends ServiceEntityRepository<Pastry>
 *
 * @method Pastry|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pastry|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pastry[]    findAll()
 * @method Pastry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PastryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pastry::class);
        // $config = new \Doctrine\ORM\Configuration();
        // $config->addCustomStringFunction('ROUND', 'App\DQL\Round');
        // $config->addCustomStringFunction('JSON_EXTRACT', 'App\DQL\JsonExtract');

    }
    public function sumAllPrices()
    {
        return $this->createQueryBuilder('p')
            ->select('SUM(p.price) as totalSum')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findPastryWithCaloriesGreaterThan(int $minCalories)
    {
        return $this->createQueryBuilder('p')
            ->andWhere("p.calory  > :minCalories")
            ->setParameter('minCalories', $minCalories)
            ->getQuery()
            ->getResult();
    }

    public function incrPastryCaloryTotalById(int $id, float $perc)
    {

        $queryBuilder = $this->createQueryBuilder('p')
            ->update(Pastry::class, 'p')
            ->set('p.calory', 'ROUND( (p.calory * :perc) , 2)') // Augmente de x%
            ->where('p.id IN (:id)')
            ->setParameter('perc', $perc)
            ->setParameter('id', $id);

        return $queryBuilder->getQuery()->execute();
    }


    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT ROUND(30.89, 1 ) FROM App\Entity\Pastry p'
            )
            ->getResult();
    }

    public function findPastryByOriginNameBis(string $name)
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT p
                FROM App\Entity\Pastry p
                WHERE JSON_EXTRACT(p.origin, '$.country') = :name"
            )
            ->setParameters(['name' => $name])
            ->getResult();
    }

    public function findPastryByOriginName(string $name)
    {
        $table = $this->getClassMetadata()->table["name"];

        $sql =  "SELECT p.* "
            . "FROM " . $table . " AS p "
            . "WHERE JSON_EXTRACT(p.origin, $.country) = :name ";

        $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addEntityResult(Pastry::class, "p");

        // On mappe le nom de chaque colonne en base de données sur les attributs de nos entités
        foreach ($this->getClassMetadata()->fieldMappings as $obj) {
            $rsm->addFieldResult("p", $obj["columnName"], $obj["fieldName"]);
        }

        $stmt = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        $stmt->setParameter(":name", $name);

        $stmt->execute();

        return $stmt->getResult();
    }
}
