<?php

namespace App\Traits;

trait ShuffleCard
{
    /**
     * @param int $maxNumCards
     * @param array $cardsArr
     * @return array
     */
    public function shuffleCards(int $maxNumCards, array $cardsArr): array
    {
        $res = [];
        foreach (array_rand($cardsArr, $maxNumCards) as $rand) {
            $res [] = $cardsArr[$rand];
        }
        return $res;
    }

    /**
     * @param array $cardsArr
     * @return array
     */
    public function sortShuffleCards(array $cardsArr): array
    {
        $temps = [];
        foreach ($cardsArr as $key => $row) {
            $temps[$key] = $row['value'];
        }
        array_multisort($temps, SORT_NUMERIC, $cardsArr);

        return $cardsArr;
    }

}