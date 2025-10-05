  </main>

  <footer>
    <div class="container">
      <div class="inner">
        <div class="contact">
          <a href="/" title="Pope Design Group"><img src="/wp-content/themes/popedesign/images/logo-reverse.svg" alt="Pope Design Group"></a>
          <p>
            <?php echo get_field('street_address', 'options');?><br>
            <?php echo get_field('city_state_zip', 'options');?><br>
            <a href="tel:+<?php echo get_field('phone_number', 'options');?>" class="phone"><?php echo get_field('phone_number_display', 'options');?></a>
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
            <a target="_blank" href="https://www.linkedin.com/company/pope-design-group/?viewAsMember=true"><img src="/wp-content/themes/popedesign/images/linkedin.svg" alt="Follow Pope on LinkedIn"></a>
            <a target="_blank" href="https://www.facebook.com/popedesigngroup"><img src="/wp-content/themes/popedesign/images/facebook.svg" alt="Follow Pope on Facebook"></a>
            <a target="_blank" href="https://twitter.com/popedesigngroup"><img src="/wp-content/themes/popedesign/images/twitterx.svg" alt="Follow Pope on X"></a>
            <a target="_blank" href="https://www.instagram.com/popedesigngroup/"><img src="/wp-content/themes/popedesign/images/instagram.svg" alt="Follow Pope on Instagram"></a>
          </div>
          <div class="legal">
            <a href="/privacy-legal">Privacy</a> |
            <a href="/privacy-legal">Legal</a>
          </div>
        </div>
      </div>
      <div class="copyright">
        Pope Design Group &copy; <?php echo date('Y'); ?> All Rights Reserved.
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>
<script src="/wp-content/themes/popedesign/js/popedesign.js"></script>
</body>
</html>
