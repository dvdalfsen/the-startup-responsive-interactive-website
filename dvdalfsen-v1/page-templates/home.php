<?php

$args = array(
    'post_type' => 'routes',
    'posts_per_page' => -1,
    'order' => 'DESC',
    'orderby' => 'date',
    'post_status' => 'publish',
);

$loop = new WP_Query( $args );


?>

<section>
    <h1>Rides from Ride Out</h1>
    <h2>Discover all our routes on Komoot</h2>

    <?php 
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : 
            $loop->the_post();
            $id = get_the_ID();

            // Fetch custom fields
            $foto = get_field('foto', $id);
            $title = get_field('titel', $id);
            $terrein = get_field('terrein', $id);
            $kilometers = get_field('kilometers', $id);
            $steiging = get_field('steiging', $id);

            console_log($loop);
    ?>
            <div class="route">

                <img src="<?= $foto ?>" alt="">

                <h3><?= $title ?></h3>

                <p><?= $terrein ?></p>

                <p><?= $kilometers ?></p>
                <p><?= $steiging ?></p>
            </div>
    <?php 
        endwhile;
    else :
    ?>
        <p>No routes found.</p>
    <?php 
    endif;
    wp_reset_postdata();
    ?>
</section>