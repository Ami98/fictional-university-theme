<?php

get_header();

while (have_posts()) {
    the_post();
    pageBanner();
?>


    <div class="container container--narrow page-section">


        <div class="generic-content">
            <div class="row group">
                <div class="one-third"><?php the_post_thumbnail('professorPortrait'); ?></div>
                <div class="two-thirds"><?php the_content(); ?></div>
            </div>
        </div>
        <?php
        $relatedPrograms = get_field('related_pograms');
        // echo $relatedPrograms[0]->ID . "<br>";
        // echo $relatedPrograms[0]->post_date;
        // echo "<pre>";
        // print_r($relatedPrograms);
        // echo "</pre>";
        if ($relatedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
            echo '<ul class="link-list min-list">';
            foreach ($relatedPrograms as $program) {
                // echo '<a href=" ' . esc_url(get_permalink($program->ID)) . ' ">' . esc_html($program->post_name) . '</a><br>';
        ?>
                <li><a href="<?php the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
        <?Php
            }
            echo '</ul>';
        }
        ?>
    </div>

<?php }

get_footer();

?>