<?php
/*
Plugin Name: Custom GraphQL Fields
Description: Adds custom GraphQL fields to WordPress.
Version: 1.0
Author: Your Name
*/



add_action('graphql_register_types', function () {
    register_graphql_field('RootQuery', 'currentUser', [
        'type' => 'User',
        'description' => __('Get the current logged-in user', 'your-textdomain'),
        'resolve' => function ($root, $args, $context, $info) {
            return !empty($context->user) ? $context->user : null;
        }
    ]);
});
