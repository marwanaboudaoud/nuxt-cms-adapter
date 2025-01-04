<?php
namespace modules\mycustommodule\graphql;

use Craft;
use craft\base\ElementInterface;
use craft\elements\Entry;
use craft\graphql\base\Mutation;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;

class GraphQL extends Mutation
{
    public static function getMutationType()
    {
        return Type::listOf(Type::nonNull(Type::string()));
    }

    public function resolve($rootValue, array $args, $context, ResolveInfo $info)
    {
        $entry = new Entry();
        $entry->sectionId = Craft::$app->sections->getSectionByHandle('contactFormSubmissions')->id;
        $entry->typeId = Craft::$app->sections->getEntryTypesBySectionId($entry->sectionId)[0]->id;
        $entry->setFieldValues($args);

        if (Craft::$app->elements->saveElement($entry)) {
            return [
                'success' => true,
                'id' => $entry->id,
                'title' => $entry->title
            ];
        } else {
            return [
                'success' => false,
                'errors' => $entry->getErrors()
            ];
        }
    }

    public static function getMutationName()
    {
        return 'submitForm';
    }

    public static function getArguments()
    {
        return [
            'firstName' => Type::nonNull(Type::string()),
            'lastName' => Type::nonNull(Type::string()),
            'phoneNumber' => Type::nonNull(Type::string()),
            'city' => Type::nonNull(Type::string()),
        ];
    }
}
