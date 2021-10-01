<?php
  $course_id = get_the_id();
  $course_price = learndash_get_course_price($course_id);
  $course_status_indicator = learndash_course_status($course_id, get_current_user_id(), true);
  $course_status = $course_status_indicator != '' ? $course_status_indicator : 'not_started';
  $course_step_count = learndash_get_course_steps_count($course_id);

  $thumbnail_url = get_the_post_thumbnail_url() != '' ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri() . '/inc/img/card-placeholder.jpg';
?>

<div class="card-course__card card-course__card--course">
  <div class="card-course__body">
    <div class="card-course__columns">
      <div class="card-course__column">
        <div class="card-course__image-wrap">
          <img
            class="card-course__image"
            src="<?php echo $thumbnail_url; ?>"
            alt="<?php the_title(); ?>"
          />
        </div>
      </div>
      <div class="card-course__column">
        <div class="card-course__content">
          <p
            class="card-course__date"
          >
            <?php the_date('d M y'); ?>
          </p>

          <h4 class="card-course__title">
            <?php the_title(); ?>
          </h4>

          <p class="card-course__detail">
            <?php get_template_part( 'template-parts/icons/icon', 'money' ); ?>
            <?php if ($course_price['price']) : ?>
              <?php echo '£' . $course_price['price']; ?>
            <?php else : ?>
              <?php echo $course_price['type']; ?>
            <?php endif; ?>
          </p>

          <p class="card-course__detail">
            <?php get_template_part( 'template-parts/icons/icon', 'book' ); ?>
            <?php echo $course_step_count; ?>
            <?php echo $course_step_count > 1 ? 'Lessons' : 'Lesson'; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="card-course__footer">
    <p class="card-course__status<?php echo ' card-course__status--' . $course_status; ?>">
      <?php _e( 'Current Status', 'wcmc' ); ?>
      <span class="card-course__status-indicator">
        <?php echo $course_status == 'not_started' ? 'Not enrolled' : 'Enrolled'; ?>
      </span>
    </p>
    <a
      href="<?php the_permalink(); ?>"
      class="card-course__link"
      :title="title"
    >
      <?php _e( 'Get started', 'wcmc' ); ?>
      <?php get_template_part( 'template-parts/icons/icon', 'arrow-right' ); ?>
    </a>
  </div>
</div>
