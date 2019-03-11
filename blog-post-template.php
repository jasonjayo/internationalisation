<article class="blog-post">        
    <h2>
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h2>
    <p class="blog-post-meta">
        <strong><?php the_date("F j, Y"); ?></strong> by <a href="#"><?php the_author() ?></a>
    </p>
    <?php the_content(__('(more…)')); ?>
</article>