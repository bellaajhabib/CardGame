<?php

namespace App\Services;

use App\Traits\ShuffleCard;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Flex\PackageJsonSynchronizer;

class PlayingCardBoxService
{
    use ShuffleCard;

    private ParameterBagInterface $params;
    private array $historyCardsList;

    /**
     * @param int $nubOfCardDistribution
     * @param ParameterBagInterface $params
     */
    function __construct(private int $nubOfCardDistribution, ParameterBagInterface $params)
    {
        $this->params = $params;
        $this->historyCardsList = [];
    }

    /**
     * @return array
     */
    public function getTenShuffleCards(): array
    {
        return $this->shuffleCards($this->nubOfCardDistribution, $this->cardsBags($this->params->get('rummy')));
    }

    /**
     * @return array
     */
    public function getSortShuffleCards(array $cardGame): array
    {

        return $this->sortShuffleCards($cardGame);
    }

    /**
     * @param $cardGame
     * @return array
     */
    private function cardsBags(string $cardGame): array
    {
        $data = file_get_contents("assets/json/$cardGame");

        return json_decode($data, 1);
    }

}