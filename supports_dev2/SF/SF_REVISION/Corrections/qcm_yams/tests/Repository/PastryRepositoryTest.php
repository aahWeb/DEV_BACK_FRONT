<?php
// tests/Repository/ProductRepositoryTest.php
namespace App\Tests\Repository;

use App\Entity\Pastry;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PastryRepositoryTest extends KernelTestCase
{
    private EntityManager $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSumPrices(): void
    {
        $sum = $this->entityManager
            ->getRepository(Pastry::class)->sumAllPrices();

        $this->assertSame(50.5, $sum);
    }

    public function testFindPastryWithCaloriesGreaterThan()
    {
        $count = count($this->entityManager
            ->getRepository(Pastry::class)->findPastryWithCaloriesGreaterThan(300));

        $this->assertSame(2, $count);
    }

    public function testIncrPastryCaloryTotalById(){
        $pastries = $this->entityManager->getRepository(Pastry::class)->findAll();
        $this->entityManager->getRepository(Pastry::class)->incrPastryCaloryTotalById($pastries[0]->getId(), 1.2) ;
        $total = $pastries[0]->getCalory();
        $pastries = $this->entityManager->getRepository(Pastry::class)->findAll();
        $this->entityManager->refresh($pastries[0]);
        $totalNew = $pastries[0]->getCalory();

        $this->assertSame(round( $total*1.2 , 2 ), $totalNew);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
    }
}
