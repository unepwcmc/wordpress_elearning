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
              $course = block_sub_value( 'course' );
              $course_meta = get_post_meta($course->ID);
              $course_url = get_the_permalink($course->ID);
              $course_steps = intval($course_meta['_ld_course_steps_count'][0]);
              $lessons_text = $course_steps > 1 ? 'lessons' : 'lesson';
              $course_date_modified = date_create($course->post_modified);

              $course_price_object = learndash_get_course_price($course->ID);
              $course_price = array(
                'type' => $course_price_object['type'],
                'value' => $course_price_object['price']
              );

              $image_id = $course_meta['_thumbnail_id'][0];
              $image_url = wp_get_attachment_image_src($image_id, 'full-size')[0];
            ?>

            <li class="featured-courses__item">

              <article class="featured-course__card">
                <div class="featured-course__columns">
                  <div class="featured-course__column">
                    <div class="featured-course__image-wrap">
                      <img
                        src="<?php echo $image_url; ?>"
                        alt="<?php echo $course->post_title; ?>"
                        class="featured-course__image"
                      >
                    </div>
                  </div>
                  <div class="featured-course__column">
                    <div class="featured-course__content">
                      <p class="featured-course__date">
                        <?php echo date_format($course_date_modified,"d M y"); ?>
                      </p>

                      <h4 class="featured-course__heading">
                        <?php echo $course->post_title; ?>
                      </h4>

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
                  href="<?php echo $course_url; ?>"
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
