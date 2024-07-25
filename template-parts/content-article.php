<div class="container">
    <header class="content-header">
        <div class="meta mb-3">
            <picture>
                <source srcset="<?php the_post_thumbnail_url(null, 'full');?>.webp" type="image/webp">
                <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/jpeg">
                <img class="img-fluid" src="<?php the_post_thumbnail_url('full'); ?>" alt="image">
            </picture>

            <span class="date"><?php the_date() ?></span>
            <?php
                the_tags('span class="tag"><i class="fa fa-tag"></i>', '</span>span class="tag"><i class="fa fa-tag"></i>', '</span>');
            ?>

            <span class="tag"><i class='fa fa-tag'></i> tag</span>
            <span class="tag"><i class='fa fa-tag'></i> category</span>
            <span class="comment"><a href="#comments">
                    <i class='fa fa-comment'></i> <?php comments_number(); ?> </a>
            </span>
        </div>
    </header>

    <?php
    the_content();
    ?>

    <?php
    comments_template();
    ?>

</div>
