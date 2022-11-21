<?php

namespace App\Controller;

use App\Services\PlayingCardBoxService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CardController extends AbstractController
{
    private PlayingCardBoxService $playingCardBox;

    /**
     * @param PlayingCardBoxService $playingCardBox
     */
    public function __construct(PlayingCardBoxService $playingCardBox)
    {
        $this->playingCardBox = $playingCardBox;
    }

    /**
     * @return RedirectResponse
     */
    #[Route('/', name: '')]
    public function index(): RedirectResponse
    {
        return $this->redirectToRoute('card_rand');
    }

    #[Route('/shuffle', name: 'card_rand')]
    public function cardsInHand()
    {
        return new JsonResponse($this->playingCardBox->getTenShuffleCards());

    }

    #[Route('/sort', name: 'card_sort')]
    public function cardsSort()
    {
        return new JsonResponse($this->playingCardBox->
        getSortShuffleCards($this->playingCardBox->getTenShuffleCards()));
    }
}