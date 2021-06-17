<?php

namespace App\Controller;

use App\UseCase\ListTicket\ListTicket;
use App\UseCase\ListTicket\ListTicketPresenter;
use App\UseCase\ListTicket\ListTicketRequest;
use Kernel\AbstractController;
use Kernel\Layer\Presentation\JsonView;
use Kernel\RequestAdapter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/{limit}", name="blog_list", methods={"GET"}, requirements={"limit"="\d+"})
     */
    public function index(RequestAdapter $request): JsonResponse
    {
        $listTicketRequest = new ListTicketRequest($request->getParameters()["limit"]);
        $listTicketPresenter = new ListTicketPresenter();

        $jsonView = new JsonView();
        $listTicket = new ListTicket();

        $listTicket->execute($listTicketRequest, $listTicketPresenter);
        return $jsonView->generate($listTicketPresenter->viewModel());
    }
}
