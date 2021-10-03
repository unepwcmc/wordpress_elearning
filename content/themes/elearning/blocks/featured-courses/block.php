<?php
  /*
    Featured Courses Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $section_title = block_field('section-title', false);
?>

<div class="featured-courses">
  <div class="featured-courses__inner">
    <div class="featured-courses__header">
      <h3 class="featured-courses__title">
        <?php echo $section_title; ?>
      </h3>
    </div>
    <div class="featured-courses__body">

      <?php if ( block_rows( 'courses' ) ) : ?>
        <ul class="featured-courses__items">

          <?php while ( block_rows( 'courses' ) ) : block_row( 'courses' );?>
            <?php
              $post = block_sub_value( 'course' );
              $post_meta = get_post_meta($post->ID);
              $post_url = get_the_permalink($post->ID);
              $course_steps = intval($post_meta['_ld_course_steps_count'][0]);
              $lessons_text = $course_steps > 1 ? 'lessons' : 'lesson';

              $course_price_object = learndash_get_course_price($post->ID);
              $course_price = array(
                'type' => $course_price_object['type'],
                'value' => $course_price_object['price']
              );

              $image_id = $post_meta['_thumbnail_id'][0];
              $image_url = wp_get_attachment_image_src($image_id, 'full-size')[0];
            ?>

            <li class="featured-courses__item">

              <article class="featured-course__card">
                <div class="featured-course__columns">
                  <div class="featured-course__column">
                    <div class="featured-course__image-wrap">
                      <img
                        src="<?php echo $image_url; ?>"
                        alt="<?php echo $post->post_title; ?>"
                        class="featured-course__image"
                      >
                    </div>
                  </div>
                  <div class="featured-course__column">
                    <div class="featured-course__content">
                      <p class="featured-course__date">
                        09 May 21
                      </p>

                      <h4 class="featured-course__heading">
                        <?php echo $post->post_title; ?>
                      </h3>

                      <p class="featured-course__detail">
                        <?php get_template_part( 'template-parts/icons/icon', 'money' ); ?>
                        <?php
                          echo $course_price['type'] === 'free' || $course_price['type'] === 'open'
                            ? 'Free'
                            : get_price_with_currency_symbol($course_price['value']);
                        ?>
                      </p>

                      <p class="featured-course__detail">
                        <?php get_template_part( 'template-parts/icons/icon', 'book' ); ?>
                        <?php echo $course_steps . ' ' . $lessons_text; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <a
                  href="<?php echo $post_url; ?>"
                  class="featured-course__fauxlink"
                >
                  <?php _e( 'View course', 'wcmc' ); ?>
                </a>
              </article>

            </li>
          <?php endwhile; ?>

        </ul>
      <?php endif; reset_block_rows( 'courses' ); ?>

    </div>
  </div>
</div>
