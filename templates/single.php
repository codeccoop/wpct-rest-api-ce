<?php

/**
 *
 * Singel Community CE template
 *
 * @plugin wpct-rest-ce
 */

$odoo_company_id = (int) get_post_meta(get_the_ID(), 'odoo_company_id', true);
$endpoint = apply_filters('wpct_rest_ce_endpoint', $odoo_company_id);
$response = wp_remote_get($endpoint, array('sslverify' => false));

if (is_wp_error($response)) {
    require_once get_404_template();
    exit;
}

$data = json_decode($response['body'], true)['community'];

wp_head();
?>

<body class="<?= get_body_class(); ?>">
    <div class="wp-site-blocks">
        <header class="site-header wp-block-template-part"><?php block_template_part('header'); ?></header>
        <main class="site-ce-content site-content" style="margin-top: 0; padding-top: 0;">
            <ul>
                <li>
                    <p>Company ID: <?= $odoo_company_id ?></p>
                </li>
                <li>
                    <p><?= $endpoint ?></p>
                </li>
            </ul>
            <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:buttons -->
                        <div class="wp-block-buttons">
                            <!-- wp:button {"className":"is-style-button-minimal-back"} -->
                            <div class="wp-block-button is-style-button-minimal-back">
                                <a class="wp-block-button__link wp-element-button" href="/comunitats/">Tornar al mapa</a>
                            </div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"is-style-show-tablet-desktop","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-show-tablet-desktop">
                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column {"width":"59.1%"} -->
                    <div class="wp-block-column" style="flex-basis:59.1%">
                        <!-- wp:group {"className":"is-style-default","layout":{"type":"constrained"}} -->
                        <div class="wp-block-group is-style-default">
                            <!-- wp:buttons -->
                            <div class="wp-block-buttons">
                                <!-- wp:button {"style":{"typography":{"textTransform":"uppercase"}},"className":"is-style-hidden"} -->
                                <div class="wp-block-button is-style-hidden" style="text-transform:uppercase">
                                    <a class="wp-block-button__link wp-element-button"><i class="fa-solid fa-bolt"></i> Activa</a>
                                </div>
                                <!-- /wp:button -->

                                <!-- wp:button {"style":{"color":{"background":"#eab308"},"typography":{"textTransform":"uppercase"}},"className":"is-style-rounded"} -->
                                <div class="wp-block-button is-style-rounded" style="text-transform:uppercase">
                                    <a class="wp-block-button__link has-background wp-element-button" style="background-color:#eab308"><i class="fa-solid fa-bolt"></i> En construcció</a>
                                </div>
                                <!-- /wp:button -->

                                <!-- wp:button {"backgroundColor":"tertiary","textColor":"typography","style":{"typography":{"textTransform":"uppercase"}},"className":"is-style-rounded"} -->
                                <div class="wp-block-button is-style-rounded" style="text-transform:uppercase">
                                    <a class="wp-block-button__link has-typography-color has-tertiary-background-color has-text-color has-background wp-element-button">
                                        <i class="fa-solid fa-people-group"></i> <?= sizeof($data['members']) ?> Membres</a>
                                </div>
                                <!-- /wp:button -->
                            </div>
                            <!-- /wp:buttons -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"40.9%","className":"is-style-default"} -->
                    <div class="wp-block-column is-vertically-aligned-center is-style-default" style="flex-basis:40.9%">
                        <!-- wp:group {"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group">
                            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
                            <div class="wp-block-buttons">
                                <!-- wp:button {"backgroundColor":"tertiary","textColor":"typography","className":"is-style-rounded"} -->
                                <div class="wp-block-button is-style-rounded">
                                    <a class="wp-block-button__link has-typography-color has-tertiary-background-color has-text-color has-background wp-element-button" href="https://demo.somcomunitats.coop">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Accedeix a l'Oficina Virtual
                                    </a>
                                </div>
                                <!-- /wp:button -->
                            </div>
                            <!-- /wp:buttons -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"is-style-show-mobile","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-show-mobile">
                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
                        <div class="wp-block-buttons">
                            <!-- wp:button {"backgroundColor":"tertiary","textColor":"typography","className":"is-style-rounded"} -->
                            <div class="wp-block-button is-style-rounded">
                                <a class="wp-block-button__link has-typography-color has-tertiary-background-color has-text-color has-background wp-element-button" href="https://demo.somcomunitats.coop">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Accedeix a l'Oficina Virtual
                                </a>
                            </div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"is-style-show-tablet-desktop","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-show-tablet-desktop">
                <!-- wp:spacer {"height":"25px"} -->
                <div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group -->
            <div class="wp-block-group">
                <!-- wp:columns {"className":"is-style-default"} -->
                <div class="wp-block-columns is-style-default">
                    <!-- wp:column {"verticalAlignment":"top","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-top">
                        <!-- wp:heading -->
                        <h2><?= $data['name']; ?></h2>
                        <!-- /wp:heading -->

                        <!-- wp:columns -->
                        <div class="wp-block-columns">
                            <!-- wp:column {"width":"95%"} -->
                            <div class="wp-block-column" style="flex-basis:95%">
                                <!-- wp:group {"className":"is-style-show-mobile","layout":{"type":"constrained"}} -->
                                <div class="wp-block-group is-style-show-mobile">
                                    <!-- wp:buttons -->
                                    <div class="wp-block-buttons">
                                        <!-- wp:button {"style":{"typography":{"textTransform":"uppercase"}},"className":"is-style-hidden"} -->
                                        <div class="wp-block-button is-style-hidden" style="text-transform:uppercase">
                                            <a class="wp-block-button__link wp-element-button">
                                                <i class="fa-solid fa-bolt"></i> Activa
                                            </a>
                                        </div>
                                        <!-- /wp:button -->

                                        <!-- wp:button {"style":{"typography":{"textTransform":"uppercase"},"color":{"background":"#eab308"}},"className":"is-style-rounded"} -->
                                        <div class="wp-block-button is-style-rounded" style="text-transform:uppercase">
                                            <a class="wp-block-button__link has-background wp-element-button" style="background-color:#eab308">
                                                <i class="fa-solid fa-bolt"></i> En construcció
                                            </a>
                                        </div>
                                        <!-- /wp:button -->

                                        <!-- wp:button {"backgroundColor":"tertiary","textColor":"typography","style":{"typography":{"textTransform":"uppercase"}},"className":"is-style-rounded"} -->
                                        <div class="wp-block-button is-style-rounded" style="text-transform:uppercase">
                                            <a class="wp-block-button__link has-typography-color has-tertiary-background-color has-text-color has-background wp-element-button">
                                                <i class="fa-solid fa-people-group"></i> <?= sizeof($data['members']); ?> Membres
                                            </a>
                                        </div>
                                        <!-- /wp:button -->
                                    </div>
                                    <!-- /wp:buttons -->

                                    <!-- wp:spacer {"height":"25px"} -->
                                    <div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
                                    <!-- /wp:spacer -->
                                </div>
                                <!-- /wp:group -->

                                <!-- wp:paragraph -->
                                <p>
                                    <?= $data['contact_info']['street'] . '. ' . $data['contact_info']['postal_code'] . ' ' . $data['contact_info']['city']; ?><br>
                                    <a href="http://somcomunitats.coop"><i class="fa-solid fa-arrow-up-right-from-square"></i> somcomunitats.coop</a>
                                </p>
                                <!-- /wp:paragraph -->

                                <!-- wp:group {"className":"categories-cloud","layout":{"type":"constrained"}} -->
                                <div class="wp-block-group categories-cloud">
                                    <?php
                                    foreach ($data['active_services'] as $service) : ?>
                                        <!-- wp:html -->
                                        <div class="category-container">
                                            <div class="category-dot"><?= apply_filters('wpct_rest_ce_service_icon', $service) ?></div>
                                            <p class="category-txt"><?= $service['name']; ?></p>
                                        </div>
                                        <!-- /wp:html -->
                                    <?php endforeach; ?>
                                </div>
                                <!-- /wp:group -->

                                <!-- wp:heading {"level":6} -->
                                <h6>Estem construïnt un model energètic sostenible.</h6>
                                <!-- /wp:heading -->

                                <!-- wp:spacer {"height":"25px"} -->
                                <div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->

                                <!-- wp:buttons -->
                                <div class="wp-block-buttons">
                                    <!-- wp:button {"style":{"typography":{"textTransform":"uppercase"}},"className":"is-style-fill"} -->
                                    <div class="wp-block-button is-style-fill" style="text-transform:uppercase">
                                        <a class="wp-block-button__link wp-element-button" href="https://erp-test.somcomunitats.coop/ca_ES/become_cooperator?odoo_company_id=<?= $odoo_company_id; ?>">Adherir-se</a>
                                    </div>
                                    <!-- /wp:button -->
                                </div>
                                <!-- /wp:buttons -->
                            </div>
                            <!-- /wp:column -->

                            <!-- wp:column {"width":"5%","className":"is-style-show-desktop"} -->
                            <div class="wp-block-column is-style-show-desktop" style="flex-basis:5%"></div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"","className":"is-style-show-desktop"} -->
                    <div class="wp-block-column is-vertically-aligned-center is-style-show-desktop">
                        <!-- wp:image {"align":"center","id":1293,"sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image aligncenter size-full"><img src="https://somcomunitats.coop/wp-content/uploads/2022/10/Comunitat-CE.jpg" alt="" class="wp-image-1293" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->

            <!-- wp:spacer {"height":"50px"} -->
            <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:group {"className":"is-style-show-mobile-tablet","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-show-mobile-tablet">
                <!-- wp:image {"align":"center","id":1293,"sizeSlug":"full","linkDestination":"none"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="https://somcomunitats.coop/wp-content/uploads/2022/10/Comunitat-CE.jpg" alt="" class="wp-image-1293" /></figure>
                <!-- /wp:image -->

                <!-- wp:spacer {"height":"50px"} -->
                <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
                <!-- /wp:spacer -->
            </div>
            <!-- /wp:group -->

            <!-- wp:ubc/tabs {"tabTitles":["Com arribar-hi","Contactar","Butlletí","Comparteix"]} -->
            <section class="wp-block-ubc-tabs ubc-accordion-tabs" data-selected-tab="0">
                <ul class="ubc-accordion-tabs__tab-list" role="tablist">
                    <li id="com-arribar-hi" role="presentation"><a role="tab" id="com-arribar-hi" aria-controls="section1 " aria-selected="true" class="ubc-accordion-tabs__tabs-trigger js-tabs-trigger" href="#section1">Com arribar-hi</a></li>
                    <li id="contactar" role="presentation"><a role="tab" id="contactar" aria-controls="section2 " aria-selected="false" class="ubc-accordion-tabs__tabs-trigger js-tabs-trigger" href="#section2">Contactar</a></li>
                    <li id="butlletí" role="presentation"><a role="tab" id="butlleti" aria-controls="section3 " aria-selected="false" class="ubc-accordion-tabs__tabs-trigger js-tabs-trigger" href="#section3">Butlletí</a></li>
                    <li id="comparteix" role="presentation"><a role="tab" id="comparteix" aria-controls="section4 " aria-selected="false" class="ubc-accordion-tabs__tabs-trigger js-tabs-trigger" href="#section4">Comparteix</a></li>
                </ul><!-- wp:ubc/tab {"index":0,"title":"Com arribar-hi"} -->
                <section index="1" class="wp-block-ubc-tab ubc-accordion-tabs__tabs-panel js-tabs-panel active" id="section1" role="tabpanel" aria-labelledby="tab1">
                    <div class="ubc-accordion-tabs__accordion-trigger js-accordeon-trigger" aria-controls="section1" tabindex="0">Com arribar-hi<div class="ubc-accordion-tabs__accordion-trigger-icon"><span class="label--open">Open</span><span class="label--close">Close</span><svg aria-hidden="true" focusable="false" viewBox="0 0 20 20">
                                <rect class="vert" height="18" width="2" fill="currentColor" y="1" x="9"></rect>
                                <rect height="2" width="18" fill="currentColor" y="9" x="1"></rect>
                            </svg></div>
                    </div>
                    <div class="content">
                        <!-- wp:html -->
                        <iframe allowfullscreen="" allow="clipboard-write" id="map" class="h-full w-full" src="https://community-maps-frontend.coopdevs.org/ca/cetest/maps/comunitats/?mapPlace=comunitat-energetica-vilanoveta&amp;searcher=false&amp;filter=false&amp;hideInfoPlace=true" width="100%" height="550px" frameborder="0"></iframe>
                        <script type="text/javascript" id="community-maps-builder" data-iframe-id="map" src="https://community-maps-frontend.coopdevs.org/iframe-integration.js"></script>
                        <!-- /wp:html -->
                    </div>
                </section>
                <!-- /wp:ubc/tab -->

                <!-- wp:ubc/tab {"index":1,"title":"Contactar"} -->
                <section index="2" class="wp-block-ubc-tab ubc-accordion-tabs__tabs-panel js-tabs-panel" id="section2" role="tabpanel" aria-labelledby="tab2">
                    <div class="ubc-accordion-tabs__accordion-trigger js-accordeon-trigger" aria-controls="section2" tabindex="0">Contactar<div class="ubc-accordion-tabs__accordion-trigger-icon"><span class="label--open">Open</span><span class="label--close">Close</span><svg aria-hidden="true" focusable="false" viewBox="0 0 20 20">
                                <rect class="vert" height="18" width="2" fill="currentColor" y="1" x="9"></rect>
                                <rect height="2" width="18" fill="currentColor" y="9" x="1"></rect>
                            </svg></div>
                    </div>
                    <div class="content">
                        <!-- wp:spacer {"height":"50px"} -->
                        <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:columns -->
                        <div class="wp-block-columns">
                            <!-- wp:column {"width":"20%"} -->
                            <div class="wp-block-column" style="flex-basis:20%"></div>
                            <!-- /wp:column -->

                            <!-- wp:column {"width":"60%"} -->
                            <div class="wp-block-column" style="flex-basis:60%">
                                <!-- wp:group {"className":"is-style-horizontal-padded","layout":{"type":"constrained"}} -->
                                <div class="wp-block-group is-style-horizontal-padded">
                                    <!-- wp:gravityforms/form {"formId":"4","title":false,"description":false,"ajax":true,"fieldValues":"odoo_company_id=<?= $odoo_company_id; ?>","formPreview":false} /-->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:column -->

                            <!-- wp:column {"width":"20%"} -->
                            <div class="wp-block-column" style="flex-basis:20%"></div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->

                        <!-- wp:spacer {"height":"50px"} -->
                        <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->
                    </div>
                </section>
                <!-- /wp:ubc/tab -->

                <!-- wp:ubc/tab {"index":2,"title":"Butlletí"} -->
                <section index="3" class="wp-block-ubc-tab ubc-accordion-tabs__tabs-panel js-tabs-panel" id="section3" role="tabpanel" aria-labelledby="tab3">
                    <div class="ubc-accordion-tabs__accordion-trigger js-accordeon-trigger" aria-controls="section3" tabindex="0">Butlletí<div class="ubc-accordion-tabs__accordion-trigger-icon"><span class="label--open">Open</span><span class="label--close">Close</span><svg aria-hidden="true" focusable="false" viewBox="0 0 20 20">
                                <rect class="vert" height="18" width="2" fill="currentColor" y="1" x="9"></rect>
                                <rect height="2" width="18" fill="currentColor" y="9" x="1"></rect>
                            </svg></div>
                    </div>
                    <div class="content">
                        <!-- wp:spacer {"height":"50px"} -->
                        <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:columns -->
                        <div class="wp-block-columns">
                            <!-- wp:column {"width":"20%"} -->
                            <div class="wp-block-column" style="flex-basis:20%"></div>
                            <!-- /wp:column -->

                            <!-- wp:column {"width":"60%"} -->
                            <div class="wp-block-column" style="flex-basis:60%">
                                <!-- wp:group {"className":"is-style-horizontal-padded","layout":{"type":"constrained"}} -->
                                <div class="wp-block-group is-style-horizontal-padded">
                                    <!-- wp:gravityforms/form {"formId":"5","title":false,"description":false,"ajax":true,"fieldValues":"odoo_company_id=<?= $odoo_company_id; ?>","formPreview":false} /-->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:column -->

                            <!-- wp:column {"width":"20%"} -->
                            <div class="wp-block-column" style="flex-basis:20%"></div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->

                        <!-- wp:spacer {"height":"50px"} -->
                        <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->
                    </div>
                </section>
                <!-- /wp:ubc/tab -->

                <!-- wp:ubc/tab {"index":3,"title":"Comparteix"} -->
                <section index="4" class="wp-block-ubc-tab ubc-accordion-tabs__tabs-panel js-tabs-panel" id="section4" role="tabpanel" aria-labelledby="tab4">
                    <div class="ubc-accordion-tabs__accordion-trigger js-accordeon-trigger" aria-controls="section4" tabindex="0">Comparteix<div class="ubc-accordion-tabs__accordion-trigger-icon"><span class="label--open">Open</span><span class="label--close">Close</span><svg aria-hidden="true" focusable="false" viewBox="0 0 20 20">
                                <rect class="vert" height="18" width="2" fill="currentColor" y="1" x="9"></rect>
                                <rect height="2" width="18" fill="currentColor" y="9" x="1"></rect>
                            </svg></div>
                    </div>
                    <div class="content">
                        <!-- wp:spacer {"height":"50px"} -->
                        <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:columns -->
                        <div class="wp-block-columns">
                            <!-- wp:column {"width":"20%"} -->
                            <div class="wp-block-column" style="flex-basis:20%"></div>
                            <!-- /wp:column -->

                            <!-- wp:column {"width":"60%"} -->
                            <div class="wp-block-column" style="flex-basis:60%">
                                <!-- wp:group {"className":"is-style-horizontal-padded","layout":{"type":"constrained"}} -->
                                <div class="wp-block-group is-style-horizontal-padded">
                                    <!-- wp:social-links {"openInNewTab":true,"showLabels":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
                                    <ul class="wp-block-social-links has-visible-labels is-style-logos-only">
                                        <!-- wp:social-link {"url":"https://twitter.com/intent/tweet?text=XXX\u0026url=XXX","service":"twitter"} /-->

                                        <!-- wp:social-link {"url":"https://www.facebook.com/sharer/sharer.php?u=XXXX","service":"facebook"} /-->

                                        <!-- wp:social-link {"url":"http://www.linkedin.com/shareArticle?mini=true\u0026title=XXX\u0026url=XXX\u0026summary=","service":"linkedin"} /-->
                                    </ul>
                                    <!-- /wp:social-links -->
                                </div>
                                <!-- /wp:group -->
                            </div>
                            <!-- /wp:column -->

                            <!-- wp:column {"width":"20%"} -->
                            <div class="wp-block-column" style="flex-basis:20%"></div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->

                        <!-- wp:spacer {"height":"50px"} -->
                        <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->
                    </div>
                </section>
                <!-- /wp:ubc/tab -->
            </section>
            <!-- /wp:ubc/tabs -->
        </main>
        <footer class="site-footer"><?php block_template_part('footer'); ?></footer>
    </div>

    <?php wp_footer(); ?>
</body>
