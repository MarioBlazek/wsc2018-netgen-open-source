<?php

namespace Netgen\Bundle\MoreDemoBundle\Templating\Twig\Extension;

use eZ\Publish\API\Repository\ContentService;
use eZ\Publish\API\Repository\LocationService;
use eZ\Publish\API\Repository\Values\Content\Location;
use eZ\Publish\Core\Helper\TranslationHelper;

class DemoRuntime
{
    /**
     * @var LocationService
     */
    private $locationService;

    /**
     * @var ContentService
     */
    private $contentService;

    /**
     * @var TranslationHelper
     */
    private $translationHelper;

    public function __construct(LocationService $locationService, ContentService $contentService, TranslationHelper $translationHelper)
    {
        $this->locationService = $locationService;
        $this->contentService = $contentService;
        $this->translationHelper = $translationHelper;
    }

    public function getParentLocationName(Location $location)
    {
        $parentLocation = $this->locationService->loadLocation($location->parentLocationId);
        $parentContent = $this->contentService->loadContent($parentLocation->contentInfo->id);

        return $this->translationHelper->getTranslatedContentName($parentContent);
    }
}
