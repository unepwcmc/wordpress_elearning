<?php
/*-------------------------------------------------------------------------------------------------
  Relevanssi REST API Support
------------------------------------------------------------------------------------------------- */

add_action( 'rest_api_init', 'relevanssi_rest_api_filter_add_filters' );

// Add filter to posts
function relevanssi_rest_api_filter_add_filters() {

  // Register new route for search queries
  register_rest_route( 'relevanssi/v1', 'search', array(
    'methods'  => WP_REST_Server::READABLE,
    'callback' => 'relevanssi_search_route_callback',
  ) );

}

/**
 * Generate results for the /wp-json/relevanssi/v1/search route.
 *
 * @param WP_REST_Request $request Full details about the request.
 *
 * @return WP_REST_Response|WP_Error The response for the request.
 */
  function relevanssi_search_route_callback( WP_REST_Request $request ) {

    $parameters = $request->get_query_params();

    // Force the posts_per_page to be no more than 12
    if (
      isset( $parameters['per_page'] )
      && ( (int) $parameters['per_page'] >= 1
      && (int) $filter['per_page'] <= 12 )
    ) {
      $per_page = intval($parameters['per_page']);
    } else {
      $per_page = 12;
    }

    // Default search args
    $args = array(
      'order' => 'DESC',
      'orderby' => 'date',
      'paged' => $parameters['page'],
      'post_type' => 'resource',
      'posts_per_page' => $per_page,
      'tax_query' => []
    );

    // Add additional arguements conditionally from parameters
    if ( isset( $parameters['s'] ) ) {
      $args['s'] = $parameters['s'];
    }

    if ( isset( $parameters['orderby'] ) ) {
      $args['orderby'] = $parameters['orderby'];
    }

    if ( isset( $parameters['order'] ) ) {
      $args['order'] = $parameters['order'];
    }

    if ( isset( $parameters['resource_stage'] ) ) {
      $resource_stage_query = array(
        'taxonomy' => 'resource_stage',
        'field' => 'term_id',
        'terms' => explode(',', $parameters['resource_stage'])
      );

      array_push($args["tax_query"], $resource_stage_query);
    }

    if ( isset( $parameters['resource_type'] ) ) {
      $resource_type_query = array(
        'taxonomy' => 'resource_type',
        'field' => 'term_id',
        'terms' => explode(',', $parameters['resource_type'])
      );

      array_push($args["tax_query"], $resource_type_query);
    }

    // run query
    $search_query = new WP_Query( $args );
    if ( function_exists('relevanssi_do_query') ) {
      relevanssi_do_query($search_query);
    }

    $controller = new WP_REST_Posts_Controller( 'post' );
    $posts = array();

    while ( $search_query->have_posts() ) : $search_query->the_post();
      $data = $controller->prepare_item_for_response( $search_query->post, $request );
      $posts[] = $controller->prepare_response_for_collection( $data );
    endwhile;

    // return results
    if ( !empty( $posts ) ) {
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
