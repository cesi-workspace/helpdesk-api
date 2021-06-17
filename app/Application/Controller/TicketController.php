<?php

namespace App\Application\Controller;

use App\Application\UseCase\DeleteTicket\DeleteTicket;
use App\Application\UseCase\DeleteTicket\DeleteTicketPresenter;
use App\Application\UseCase\DeleteTicket\DeleteTicketRequest;
use App\Application\UseCase\ListTicket\ListTicket;
use App\Application\UseCase\ListTicket\ListTicketPresenter;
use App\Application\UseCase\ListTicket\ListTicketRequest;
use App\Application\UseCase\ShowTicket\ShowTicket;
use App\Application\UseCase\ShowTicket\ShowTicketPresenter;
use App\Application\UseCase\ShowTicket\ShowTicketRequest;
use App\Application\UseCase\UpdateTicket\UpdateTicket;
use App\Application\UseCase\UpdateTicket\UpdateTicketPresenter;
use App\Application\UseCase\UpdateTicket\UpdateTicketRequest;
use Kernel\AbstractController;
use Kernel\Layer\Presentation\JsonView;
use Kernel\RequestAdapter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TicketController extends AbstractController
{

    /**
     * @Route("/tickets/{limit}", name="tickets_list", methods={"GET"}, requirements={"limit"="\d+"})
     */
    public function listTicket(RequestAdapter $request): JsonResponse
    {
        $listTicketRequest = new ListTicketRequest($request->getParameters()["limit"]);
        $listTicketPresenter = new ListTicketPresenter();

        $jsonView = new JsonView();
        $listTicket = new ListTicket();

        $listTicket->execute($listTicketRequest, $listTicketPresenter);
        return $jsonView->generate($listTicketPresenter->viewModel());
    }

    /**
     * @Route("/ticket/{id}", name="ticket_show", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function showTicket(RequestAdapter $request): JsonResponse
    {
        $listTicketRequest = new ShowTicketRequest($request->getParameters()["id"]);
        $listTicketPresenter = new ShowTicketPresenter();

        $jsonView = new JsonView();
        $listTicket = new ShowTicket();

        $listTicket->execute($listTicketRequest, $listTicketPresenter);
        return $jsonView->generate($listTicketPresenter->viewModel());
    }

    /**
     * @Route("/ticket/{id}", name="ticket_delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function deleteTicket(RequestAdapter $request): JsonResponse
    {
        $deleteTicketRequest = new DeleteTicketRequest($request->getParameters()["id"]);
        $deleteTicketPresenter = new DeleteTicketPresenter();

        $jsonView = new JsonView();
        $deleteTicket = new DeleteTicket();

        $deleteTicket->execute($deleteTicketRequest, $deleteTicketPresenter);
        return $jsonView->generate($deleteTicketPresenter->viewModel());
    }

    /**
     * @Route("/ticket/{id}", name="ticket_update", methods={"PUT"}, requirements={"id"="\d+"})
     */
    public function updateTicket(RequestAdapter $request): JsonResponse
    {
        $updateTicketRequest = new UpdateTicketRequest(
            $request->getParameters()["id"],
            json_decode($request->getRequest()->getContent())
        );
        $updateTicketPresenter = new UpdateTicketPresenter();

        $jsonView = new JsonView();
        $updateTicket = new UpdateTicket();

        $updateTicket->execute($updateTicketRequest, $updateTicketPresenter);
        return $jsonView->generate($updateTicketPresenter->viewModel());
    }
}
