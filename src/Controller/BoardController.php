<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoardController extends AbstractController
{
    #[Route('/board', name: 'app_board')]
    public function index(TaskRepository $taskRepository): Response
    {

        $task = $taskRepository->findAll();

        // dd($task);

        return $this->render('board/index.html.twig', [
            'task' => $task,
        ]);
    }
}
