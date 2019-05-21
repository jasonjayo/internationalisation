<article class="blog-post">        
    <h2>
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h2>
    <p class="blog-post-meta">
        <strong><?php echo get_the_date("F jS, Y"); ?></strong> by <?php echo the_author_posts_link() ?>
    </p>
    <?php the_content(__('(more…)')); ?>
</article>