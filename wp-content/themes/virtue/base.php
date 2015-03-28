<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

   <script>
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-61291414-1', 'auto');
  	ga('send', 'pageview');
   </script>

    <div id="wrapper" class="container">
    <?php do_action('get_header');
        get_template_part('templates/header');
    ?>
      <div class="wrap contentclass" role="document">

          <?php include kadence_template_path(); ?>
            
          <?php if (kadence_display_sidebar()) : ?>
            <aside class="<?php echo esc_attr(kadence_sidebar_class()); ?> kad-sidebar" role="complementary">
              <div class="sidebar">
                <?php include kadence_sidebar_path(); ?>
              </div><!-- /.sidebar -->
            </aside><!-- /aside -->
          <?php endif; ?>
          </div><!-- /.row-->
        </div><!-- /.content -->
      </div><!-- /.wrap -->
      <?php do_action('get_footer');
      get_template_part('templates/footer'); ?>
    </div><!--Wrapper-->
  </body>
</html>