<?php

declare(strict_types=1);

namespace Netgen\Bundle\MoreDemoBundle\Templating\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DemoExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'demo_content_name',
                [DemoRuntime::class, 'getContentName'],
                ['is_safe' => ['html']]
            ),
        ];
    }
}
