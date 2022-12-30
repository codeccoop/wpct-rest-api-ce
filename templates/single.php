<?php
/**
 *
 * Singel Community CE template
 *
 * @plugin wpct-rest-api-ce
 */

wp_head();
?>
<body class="<?= get_body_class(); ?>">
<div class="wp-site-blocks">
    <header class="site-header wp-block-template-part"><?php block_template_part('header'); ?></header>
    <main class="site-ce-content site-content" style="margin-top: 0; padding-top: 0;"><?php the_content(); ?></main>
    <footer class="site-footer"><?php block_template_part('footer'); ?></footer>
</div>

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"0"}}},"className":"site-content"} -->
<main class="site-ce-content wp-block-group" style="margin-top:0;padding-top:var(--wp--custom--spacing--sxl);padding-bottom:var(--wp--custom--spacing--sxxl)">
    <!-- wp:post-content {"layout":{"inherit":true}} /-->
</main>
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->

<h1>I'm a comunity single template</h1>
<?php $odoo_community_id = get_post_meta(get_the_ID(), 'odoo_community_id', true); ?>
<strong><?= $odoo_community_id ?></strong>
<?php wp_footer(); ?>
</body>
