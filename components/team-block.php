<div class="<?php echo isset($args['member_column']) ? $args['member_column'] : 'col-lg-3';  ?>">
    <div class="team-content">
        <img class="img-fluid" src="<?php the_post_thumbnail_url('full') ?>"
            alt="<?php the_title(); ?>">
        <div class="text-center mt-2">
            <h5 class="mb-0">
                <?php the_title(); ?>
            </h5>
            <p class="m-0 small text-secondary">
                <?php echo get_the_excerpt(get_the_ID()); ?>
            </p>
        </div>
    </div>
</div>