# Aegir web server configuration file

<?php if (is_array($server->web_ports)) :
  foreach ($server->web_ports as $web_port) :?>
  NameVirtualHost *:<?php print $web_port; ?>

  <VirtualHost *:<?php print $web_port; ?>>
    ServerName default
    Redirect 404 /
  </VirtualHost>
  
<?php
endforeach;
endif;
?>

<IfModule !env_module>
  LoadModule env_module modules/mod_env.so
</IfModule>

<IfModule !rewrite_module>
  LoadModule rewrite_module modules/mod_rewrite.so
</IfModule>

# virtual hosts
Include <?php print $apache_site_conf_path ?>

# platforms
Include <?php print $apache_platform_conf_path ?>

# other configuration, not touched by aegir
Include <?php print $apache_conf_path ?>


<?php print $extra_config; ?>
