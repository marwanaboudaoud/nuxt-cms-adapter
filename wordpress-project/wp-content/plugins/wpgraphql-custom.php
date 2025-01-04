<?php
/*
Plugin Name: WPGraphQL Customization
Description: Extend WPGraphQL Schema with custom fields and types.
Version: 1.0
Author: Your Name
*/

// Hook into WPGraphQL to extend the schema
add_action( 'graphql_register_types', 'example_extend_wpgraphql_schema' );

function example_extend_wpgraphql_schema() {
  // Register customField to RootQuery
  register_graphql_field( 'RootQuery', 'customField', [
    'type' => 'CustomType',
    'resolve' => function() {
      return [
        'count' => 5,
        'testField' => 'test value...',
      ];
    }
  ] );

  // Register CustomType
  register_graphql_object_type( 'CustomType', [
    'description' => __( 'Describe what a CustomType is', 'your-textdomain' ),
    'fields' => [
      'testField' => [
        'type' => 'String',
        'description' => __( 'Describe what testField should be used for', 'your-textdomain' ),
      ],
      'count' => [
        'type' => 'Int',
        'description' => __( 'Describe what the count field should be used for', 'your-textdomain' ),
      ],
    ],
  ] );
}
