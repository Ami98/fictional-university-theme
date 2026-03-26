<?php

get_header();
pageBanner(array(
    'title' => 'All Events',
    'subtitle' => 'see what is going on in our world.'
));
?>



<div class="container container--narrow page-section">
    <?php
    while (have_posts()) {
        the_post();
        // get_template_part('template-parts/content', 'event');
        get_template_part('template-parts/content-event');
    }
    echo paginate_links();


    /* Only paged Works on archives
        Only page Works on pages
        Both handled Works everywhere ✅ 
    */


    /*  $paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

    $comingEvents = new WP_Query(array(
        'post_type'      => 'event',
        'posts_per_page' => 1,
        'paged'          => $paged,
        'meta_key'       => 'event_date',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
        'meta_query'     => array(
            array(
                'key'     => 'event_date',
                'compare' => '>=',
                'value'   => date('Ymd'),
                'type'    => 'NUMERIC'
            )
        )
    ));

    while ($comingEvents->have_posts()) {
        $comingEvents->the_post();
        get_template_part('template-parts/content', 'event');
    }

    echo paginate_links(array(
        'total'   => $comingEvents->max_num_pages,
        'current' => $paged
    ));

    wp_reset_postdata();
*/

    ?>

    <hr class="section-break">
    <p>Looking for a recape of post events? <a href="<?php echo site_url('/past-events'); ?>"><b>Check out our past events archive</b></a></p>
</div>

<?php get_footer();

?>