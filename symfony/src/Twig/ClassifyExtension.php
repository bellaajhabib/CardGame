<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ClassifyExtension extends AbstractExtension
{
    public const STRING_VALUES  = ['AS' => 1, 'Valet' => 11, 'Dame' => 12, 'Roi' => 13];
    public static $data;

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('classify', [$this, 'classifyData']),
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    public function classifyData(array $data): array
    {
        foreach ($data as ["color" => $color, "value" => $value]) {
            $index = strtolower(substr($color, 0,2));
            $index_two = self::STRING_VALUES[$value] ?? $value;

            self::$data[$index][$index_two] = $index. '_'. strtolower($value) ;
        }

        return self::$data;
    }
}
