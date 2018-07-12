<?php
/**
 * Created by PhpStorm.
 * User: Mourad Lassoued
 * Date: 11/07/2018
 * Time: 15:02
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

abstract class AbstractRepository extends EntityRepository
{
    protected function paginate(QueryBuilder $qb, $limit = 20, $offset = 0)
    {
        $limit = (int) $limit;
        if (0 === $limit) {
            throw new \LogicException('$limit must be greater than 0.');
        }

        $pager = new Pagerfanta(new DoctrineORMAdapter($qb));
        $pager->setMaxPerPage((int) $limit);
        $pager->setCurrentPage(ceil(($offset + 1) / $limit));

        return $pager;
    }
}
