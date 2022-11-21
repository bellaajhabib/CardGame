<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MySortExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('mysort', [$this, 'mysortData']),
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function mysortData(array $data): array
    {
        ksort($data);

        return $data;
    }
}
