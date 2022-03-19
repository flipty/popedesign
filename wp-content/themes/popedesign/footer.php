  </main>

  <footer>
    <div class="container">
      <div class="inner">
        <div class="contact">
          <a href="/" title="Pope Design Group"><img src="/wp-content/themes/popedesign/images/logo-reverse.svg" alt="Pope Design Group"></a>
          <p>
            767 Eustis Street, Suite 190<br>
            St. Paul, Minnesota, 55114<br>
            <a href="tel:+16516429200" class="phone">651.642.9200</a>
          </p>
        </div>
        <div class="links">
          <nav>
            <ul>
              <?php while ( have_rows('footer_links', 'options') ) : the_row();
                $page = get_sub_field('footer_page');
                $title = get_sub_field('link_title');
              ?>
              <li><a href="<?php echo get_the_permalink($page);?>">
                <?php if ($title){ echo $title; } ?>
                <?php if (!$title){ echo get_the_title($page); } ?>
              </a></li>
              <?php endwhile; ?>
            </ul>
          </nav>
          <div class="socials">
            <a href="#"><img src="/wp-content/themes/popedesign/images/linkedin.svg" alt="Follow Pope on LinkedIn"></a>
            <a href="#"><img src="/wp-content/themes/popedesign/images/facebook.svg" alt="Follow Pope on Facebook"></a>
            <a href="#"><img src="/wp-content/themes/popedesign/images/twitter.svg" alt="Follow Pope on Twitter"></a>
            <a href="#"><img src="/wp-content/themes/popedesign/images/instagram.svg" alt="Follow Pope on Instagram"></a>
          </div>
          <div class="legal">
            <a href="#">Privacy</a> |
            <a href="#">Legal</a>
          </div>
        </div>
      </div>
      <div class="copyright">
        Pope Architects, Inc. &copy; <?php echo date('Y'); ?> All Rights Reserved.
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>
<script src="/wp-content/themes/popedesign/js/popedesign.js"></script>
</body>
</html>
