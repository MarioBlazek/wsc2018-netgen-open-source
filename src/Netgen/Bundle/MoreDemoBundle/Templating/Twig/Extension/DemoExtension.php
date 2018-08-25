<?php

namespace Netgen\Bundle\MoreDemoBundle\Templating\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DemoExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction(
                'demo_parent_location_name',
                [DemoRuntime::class, 'getParentLocationName'],
                ['is_safe' => ['html']]
            ),
        ];
    }
}
