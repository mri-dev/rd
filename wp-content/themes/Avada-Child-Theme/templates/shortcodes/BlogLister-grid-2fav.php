<?php if ($data->have_posts()): ?>
<?php
  $i = 0;
?>
<?php while($data->have_posts()): $data->the_post(); $i++; ?>
  <div class="item item<?=$i?> <?=($i > 2 )?'square-simple':''?>">
    <?php if ($i <= 2): ?>
      <div class="wrapper">
        <div class="image">
          <a href="<?php echo the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo the_title(); ?>"></a>
        </div>
        <div class="data">
          <h2><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
          <div class="info">
            <?php echo the_excerpt(); ?>
            <a href="#" class="fusion-button button-flat fusion-button-round button-medium button-custom"><?php echo __('Tovább', TD); ?></a>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="wrapper">
        <div class="image">
          <div class="info-overlay">
            <div class="inset">
              <h3><?php echo the_title(); ?></h3>
            </div>
          </div>
          <a href="<?php echo the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo the_title(); ?>"></a>
        </div>
      </div>
    <?php endif; ?>
  </div>
<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>
