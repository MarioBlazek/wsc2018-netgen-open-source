<?php

namespace Netgen\Bundle\MoreDemoBundle\Templating\Twig\Extension;

use eZ\Publish\API\Repository\ContentService;
use eZ\Publish\API\Repository\Exceptions\NotFoundException;
use eZ\Publish\API\Repository\Exceptions\UnauthorizedException;
use eZ\Publish\Core\Helper\TranslationHelper;

class DemoRuntime
{
    /**
     * @var ContentService
     */
    private $contentService;

    /**
     * @var TranslationHelper
     */
    private $translationHelper;

    public function __construct(ContentService $contentService, TranslationHelper $translationHelper)
    {
        $this->contentService = $contentService;
        $this->translationHelper = $translationHelper;
    }

    public function getContentName($contentId)
    {
        try {

            $content = $this->contentService->loadContent($contentId);

            return $this->translationHelper->getTranslatedContentName($content);

        } catch (NotFoundException | UnauthorizedException $e) {

            return '';

        }
    }
}
