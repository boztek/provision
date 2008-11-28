<VirtualHost *:80>
<?php if ($site_mail) : ?>
  ServerAdmin <?php  print $site_mail; ?> 
<?php endif;?>
  DocumentRoot <?php print $publish_path; ?> 
    
  ServerName <?php print $site_url; ?>

<?php if (is_array($aliases)) :
  foreach ($aliases as $alias_url) : ?>
  ServerAlias <?php print $alias_url; ?>
<?php
 endforeach;
 endif; ?>

<?php print $extra_config; ?>

    # Error handler for Drupal > 4.6.7
    <Directory "<?php print $publish_path; ?>/sites/<?php print trim($site_url, '/'); ?>/files">
      SetHandler This_is_a_Drupal_security_line_do_not_remove
    </Directory>

</VirtualHost>
