<?php

namespace SalvatoreCapano\CronUiBundle\Controller;

use SalvatoreCapano\CronUiBundle\Service\JobProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CronJobController extends AbstractController
{
    public function __construct(private readonly JobProvider $jobProvider) {}

    #[Route(path: '%cron_ui.route_path%', name: 'cron_ui_index')]
    public function index(): Response
    {
        $jobs = $this->jobProvider->findAll();

        return $this->render('@CronUi/index.html.twig', [
            'jobs' => $jobs,
        ]);
    }
}