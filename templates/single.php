<?php
/**
 *
 * Singel Community CE template
 *
 * @plugin wpct-rest-api-ce
 */

wp_head();
$odoo_community_id = get_post_meta(get_the_ID(), 'odoo_community_id', true);
$ce_data = file_get_contents(ODOO_CE_DATA_ENDPOINT);
?>
<body class="<?= get_body_class(); ?>">
<div class="wp-site-blocks">
    <header class="site-header wp-block-template-part"><?php block_template_part('header'); ?></header>
    <main class="site-ce-content site-content" style="margin-top: 0; padding-top: 0;"><?php the_content(); ?></main>
    <footer class="site-footer"><?php block_template_part('footer'); ?></footer>
</div>
<?php wp_footer(); ?>
</body>
