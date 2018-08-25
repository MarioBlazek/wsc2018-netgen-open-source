<?php

namespace Netgen\Bundle\MoreDemoBundle\Controller;

use Netgen\Bundle\EzPlatformSiteApiBundle\Controller\Controller;
use Netgen\Bundle\EzPlatformSiteApiBundle\View\ContentView;
use Netgen\TagsBundle\API\Repository\Values\Content\Query\Criterion\TagId;
use Netgen\TagsBundle\API\Repository\Values\Tags\Tag;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use Symfony\Component\HttpFoundation\Request;

class FullViewController extends Controller
{
    public function viewRecipe(ContentView $view)
    {
        $content = $view->getSiteContent();

        if (!$content->getField('tags')->isEmpty()) {

            $tags = $content->getFieldValue('tags');

            $tagsIds = array_map(
                function(Tag $tag) {
                    return $tag->id;
                },
                $tags->tags
            );

            $criteria = [
                new Criterion\Visibility(Criterion\Visibility::VISIBLE),
                new Criterion\ContentTypeIdentifier('ng_recipe'),
                new TagId($tagsIds),
                new Criterion\LogicalNot(
                    new Criterion\ContentId($content->id)
                )
            ];

            $query = new LocationQuery();
            $query->limit = 4;
            $query->filter = new Criterion\LogicalAnd($criteria);
            $query->sortClauses = [
                new SortClause\DatePublished(LocationQuery::SORT_DESC),
            ];

            $recipies = $this->getSite()->getFilterService()->filterLocations($query);

            $view->addParameters([
                'recipies' => $this->extractValueObjects($recipies),
            ]);
        }


        return $view;
    }

    public function viewArticle(ContentView $view, Request $request)
    {
        $content = $view->getSiteContent();

        if (!$content->getField('tags')->isEmpty()) {

            $tags = $content->getFieldValue('tags');

            $tagsIds = array_map(
                function(Tag $tag) {
                    return $tag->id;
                },
                $tags->tags
            );

            $criteria = [
                new Criterion\Visibility(Criterion\Visibility::VISIBLE),
                new TagId($tagsIds),
            ];

            $query = new LocationQuery();
            $query->limit = 100;
            $query->filter = new Criterion\LogicalAnd($criteria);
            $query->sortClauses = [
                new SortClause\DatePublished(LocationQuery::SORT_DESC),
            ];

            $pager = $this->getFindPager(
                $query,
                $request->query->get('page', 1),
                3
            );

            $view->addParameters([
                'results' => $pager,
            ]);
        }


        return $view;
    }
}
