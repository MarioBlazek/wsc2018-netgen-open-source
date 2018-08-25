<?php

namespace Netgen\Bundle\MoreDemoBundle\Controller;

use eZ\Publish\API\Repository\Exceptions\NotFoundException;
use eZ\Publish\API\Repository\Repository;
use Netgen\Bundle\EzPlatformSiteApiBundle\Controller\Controller;
use Netgen\Bundle\EzPlatformSiteApiBundle\View\ContentView;
use eZ\Publish\Core\FieldType\RelationList\Value as RelationListValue;

class FullViewController extends Controller
{
    public function viewArticle(ContentView $view)
    {
        $content = $view->getContent();

        $fieldHelper = $this->get('ezpublish.field_helper');
        $translationHelper = $this->get('ezpublish.translation_helper');
        $contentService = $this->getRepository()->getContentService();
        $locationService = $this->getRepository()->getLocationService();

        if (!$fieldHelper->isFieldEmpty($content, 'authors')) {

            $value = $translationHelper->getTranslatedField($content, 'authors');

            if (!is_null($value)) {
                $authors = [];
                $value = $value->value;
                /** @var  $value RelationListValue */
                foreach ($value->destinationContentIds as $contentId) {

                    try {

                        $authorContent = $contentService->loadContent($contentId);
                        $authorLocation = $locationService->loadLocation($authorContent->contentInfo->mainLocationId);

                        if ($authorLocation->invisible || $authorLocation->hidden) {
                            continue;
                        }

                        $authors[] = $authorContent;

                    } catch (NotFoundException $e) {
                        continue;
                    }
                }

                $view->addParameters(['authors' => $authors]);
            }

        }

        return $view;
    }

    public function viewNews(ContentView $view)
    {
        $content = $view->getContent();
        $location = $view->getLocation();

        $fieldHelper = $this->get('ezpublish.field_helper');
        $translationHelper = $this->get('ezpublish.translation_helper');
        $contentService = $this->getRepository()->getContentService();
        $locationService = $this->getRepository()->getLocationService();

        if (!$fieldHelper->isFieldEmpty($content, 'authors')) {

            $value = $translationHelper->getTranslatedField($content, 'authors');

            if (!is_null($value)) {
                $authors = [];
                $value = $value->value;
                /** @var  $value RelationListValue */
                foreach ($value->destinationContentIds as $contentId) {

                    try {

                        $authorContent = $contentService->loadContent($contentId);
                        $authorLocation = $locationService->loadLocation($authorContent->contentInfo->mainLocationId);

                        if ($authorLocation->invisible || $authorLocation->hidden) {
                            continue;
                        }

                        $authors[] = $authorContent;

                    } catch (NotFoundException $e) {
                        continue;
                    }
                }

                $view->addParameters(['authors' => $authors]);
            }
        } else {

            $ownerContentId = $content->contentInfo->ownerId;
            $ownerContent = $this->getRepository()->sudo(
                function(Repository $repository) use ($ownerContentId){
                    return $repository->getContentService()->loadContent($ownerContentId);
                }
            );
//            $content = $contentService->loadContent($content->contentInfo->ownerId);

            $view->addParameters([
                'owner' => $ownerContent,
            ]);
        }

        return $view;
    }
}
