<VirtualHost *:<?php print $site_port; ?>>
    <?php if ($site_mail) : ?>
      ServerAdmin <?php  print $site_mail; ?> 
    <?php endif;?>

    ServerName <?php print $site_url; ?>
    
    <?php if (is_array($aliases)) :
     foreach ($aliases as $alias) : ?>
       ServerAlias <?php print $alias; ?>
     <?php
       endforeach;
     endif; ?>

<?php if ($ssl_redirect): ?>
    RedirectMatch permanent ^(.*) https://<?php print $site_url ?>$1
<?php else: ?>
    RedirectMatch permanent ^(.*) http://<?php print $site_url ?>$1
<?php endif; ?>
</VirtualHost>
