<?php
  /*
    Course Embed Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $course_url = block_field( 'course-url', false );
?>

<p>This course is <?php the_title(); ?></p>
<div class="course-embed">
  <iframe src="<?php echo $course_url; ?>" title="<?php the_title(); ?>"></iframe>
</div>
