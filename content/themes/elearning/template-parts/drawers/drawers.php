<div class="drawers">
  <drawers-overlay></drawers-overlay>
  <drawer name="menu">
    <add-class-on-click
      class="drawer__content"
      class-name="open"
      element=".menu-item-has-children"
    >
      <?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
    </add-class-on-click>
  </drawer>
</div>
