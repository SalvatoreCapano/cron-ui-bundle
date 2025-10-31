<?php

namespace SalvatoreCapano\CronUiBundle\Service;

use Doctrine\Persistence\ManagerRegistry;

class JobProvider
{
    public function __construct(
        private readonly ManagerRegistry $registry,
        private readonly string $jobEntityClass
    ) {}

    public function findAll(): array
    {
        $em = $this->registry->getManagerForClass($this->jobEntityClass);
        if (!$em) {
            throw new \RuntimeException(sprintf('No entity manager found for class "%s"', $this->jobEntityClass));
        }

        return $em->getRepository($this->jobEntityClass)->findAll();
    }
}