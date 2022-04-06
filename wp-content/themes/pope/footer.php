</div>
<footer>
  	<div class="container">
    <div class="row">
      
      <div class="col-sm-12 col-md-3 brand">  
	<a href="<?php echo home_url(); ?>"><img src="<?php echo home_url(); ?>/assets/logo-reverse.svg" /></a>
        <p>
        1295 Bandana Blvd. N<br />
        Suite 200<br />
        St. Paul, MN 55108<br />
        651.642.9200
        </p>
      </div>

      <?php

          $args = array(
            'theme_location'  => 'primary_navigation',
            'menu'            => 'Main Menu',
            'container'       => 'div',
            'container_class' => 'col-sm-12 col-md-7 navigation hidden-xs hidden-sm',
            'container_id'    => 'navbar-footer',
            'menu_class'      => 'nav navbar-nav',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 10,
            'walker'          => new Pope_Main_Nav_Menu // located in /lib/nav.php
          );

          if ( has_nav_menu( 'primary_navigation' ) ) :
            echo wp_nav_menu( $args );
          endif;

        ?>

      <div class="col-sm-12 col-md-2 extras">  
        <ul class="nav navbar-nav">
          <li><a href="https://sharepoint.popearch.com/login.html?lang=english" target="_blank">CLIENT LOGIN</a></li>
        </ul>
        <div class="socials">
          <a class="footer-search" href="<?php echo home_url() . '/search'; ?>"><span class="glyphicon glyphicon-search"></span></a>
          <a href="https://www.linkedin.com/company/pope-architects" target="_blank" class="linkedin"><i class="icon icon-linkedin"></i></a>
          <a href="https://www.facebook.com/popearchitectsmn" target="_blank" class="facebook"><i class="icon icon-facebook"></i></a>
          <a href="https://twitter.com/popearchitects" target="_blank" class="twitter"><i class="icon icon-twitter"></i></a>
          <a href="https://www.instagram.com/popearchitects/" target="_blank" class="instagram"><i class="icon icon-instagram"></i></a>
        </div>
      </div>

      

    </div><!--/row-->

    <div class="row subFooter">
      <div class="col-xs-12 col-md-6">
        <div class="copyright">
          Pope Architects, Inc. &copy; 2016 All Rights Reserved.
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="legal">
          <a href="<?php echo home_url() . '/privacy-legal'; ?>">Privacy | Legal</a>
        </div>
      </div>
    </div><!--/row subFooter-->

  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>