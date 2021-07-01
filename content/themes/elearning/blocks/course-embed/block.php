<?php
  /*
    Course Embed Block
    Created by UNEP-WCMC
    With Genesis Custom Blocks for Gutenberg - https://getblocklab.com/
  */

  // Variables
  $course_name = block_field( 'course-name', false );
?>

<p>This course is <?php the_title(); ?></p>
<div class="course-embed">
  <iframe src="<?php echo '/content/courses/' . $course_name . '/index.html'; ?>" title="<?php the_title(); ?>"></iframe>
</div>
