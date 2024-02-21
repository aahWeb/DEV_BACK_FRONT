<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('message', [$this, 'formatMessage']),
        ];
    }

    public function formatMessage(int $number): string
    {
        if ($number == 1) return "Grande suite";
        if ($number == 2) return "Carré";
        if ($number == 4) return "Yams";

        return '';
    }
}
