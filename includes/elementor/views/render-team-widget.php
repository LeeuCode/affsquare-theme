<div class="row">
    <?php

    $argsTeam = array(
        'post_type' => 'team',
        'posts_per_page' => $settings['posts_limit'],
        'post_status' => 'publish',
        'order_by' => 'ID'
    );

    if (isset($settings['order'])) {
        $argsTeam['order'] = $settings['order'];
    }

    $team = new WP_Query($argsTeam);

    if ($team->have_posts()):
        while ($team->have_posts()):
            $team->the_post();

            get_template_part('components/team-block', null, $settings);

        endwhile;
    endif;
    ?>
</div>