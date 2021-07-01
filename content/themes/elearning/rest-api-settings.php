<?php

function is_taxonomy_assigned_to_post_type( $post_type, $taxonomy = null ) {
	if ( is_object( $post_type ) )
		$post_type = $post_type->post_type;

	if ( empty( $post_type ) )
		return false;

	$taxonomies = get_object_taxonomies( $post_type );

	if ( empty( $taxonomy ) )
		$taxonomy = get_query_var( 'taxonomy' );

	return in_array( $taxonomy, $taxonomies );
}

/**
 * Custom JSON API endpoint.
 * Usage: http://sample-project.com/wp-json/wcmc-lms/v1/list-filters
 */
function post_filters( WP_REST_Request $request ) {
    $parameters = $request->get_query_params();

    $post_type = $parameters['post_type'];

		$excluded_taxonomies = ['translation_priority'];

    /*
      Get taxonomies by post type
    */
    $taxonomies = get_taxonomies( [], 'objects' );

    $args = array(
      'hide_empty' => 0,
			'orderby' => 'term_order',
			'order' => 'ASC'
    );

    $filters = [];

    $index = 0;
    foreach( $taxonomies as $taxonomy ) {
      if (
				in_array($post_type, $taxonomy->object_type, true) &&
				!in_array($taxonomy->name, $excluded_taxonomies)
			) {
        //Get terms by taxonomy
        $terms = get_terms( $taxonomy->name, $args);
        $new_terms = [];

        foreach ($terms as $term) {
          if ($term->count > 0) {
            array_push($new_terms, $term);
          }
        }

        // Buld array of post type taxonomies with terms
        $filters[$index] = array(
          'id' => $index,
          'label' => $taxonomy->label,
          'taxonomy' => $taxonomy->name,
          'terms' => $new_terms
        );
        $index++;
      }
    }

    $result = array(
      'filters' => $filters
    );

    // Return json.
    return $result;
}
add_action('rest_api_init', function () {
    register_rest_route('wcmc-lms/v1', '/list-filters', array(
        'methods' => 'GET',
        'callback' => 'post_filters',
    ));
});




/**
 * Grab latest post title by an author!
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,  * or null if none.
 */
function get_events_by_date_start( WP_REST_Request $request ) {

	$parameters = $request->get_query_params();

  // Force the posts_per_page to be no more than 12
  if ( isset( $parameters['per_page'] ) && ( (int) $parameters['per_page'] >= 1 && (int) $filter['per_page'] <= 12 ) ) {
    $per_page = intval($parameters['per_page']);
  } else {
    $per_page = 12;
  }

	$args = array(
		'paged' => $parameters['page'],
		'posts_per_page' => $per_page,
		'post_type'		=> 'event',
		'meta_key'			=> 'date_start',
		'orderby'			=> 'meta_value',
		'order'				=> 'ASC'
  );

  $search_query = new WP_Query( $args );

	$controller = new WP_REST_Posts_Controller('post');
  $posts = array();

  while ( $search_query->have_posts() ) : $search_query->the_post();
    $data    = $controller->prepare_item_for_response( $search_query->post, $request );
    $posts[] = $controller->prepare_response_for_collection( $data );
  endwhile;

	// return results
  if(!empty($posts)) {
    $total = $search_query->found_posts;
    $pages = $search_query->max_num_pages;
    $returned = new WP_REST_Response( $posts, 200 );
    $returned->header( 'X-WP-Total', $total );
    $returned->header( 'X-WP-TotalPages', $pages );
    return $returned;
  } else {
    return new WP_Error( 'No results', 'Nothing found' );
  }
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'wcmc-lms/v1', '/events', array(
    'methods' => 'GET',
    'callback' => 'get_events_by_date_start',
  ) );
} );
