<?php

namespace App\Repository;

use App\Entity\Calculation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Calculation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calculation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calculation[]    findAll()
 * @method Calculation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalculationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Calculation::class);
    }

    public function getCalculations(int $page = 1, int $perPage = 5): array
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('c.method method', 'c.firstInt firstInt', 'c.secondInt secondInt', 'c.answer answer', 'c.id id');

        $paginator = new Paginator($qb->addSelect('c')->getQuery());
        $paginator
            ->getQuery()
            ->setFirstResult(($page - 1) * $perPage)
            ->setMaxResults($perPage)
        ;

        try {
            return [
                'pagination' => [
                    'page' => $page,
                    'per_page' => $perPage,
                    'total' => count($paginator)
                ],
                'results' => $paginator->getIterator()->getArrayCopy()
            ];
        } catch (\Exception $e) {
            dump($e->getMessage());
            return [];
        }
    }
}
