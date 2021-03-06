<?php 
get_header();
if (have_posts()): ?>

    <h2> The search results for <?php the_search_query(); ?> </h2>


    <?php
    while(have_posts()): the_post(); ?>
	<div>
		
<article class="post <?php if(has_post_thumbnail()){?> has-thumbnail <?php }  ?>">

        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('small-thumbnail');?></a>

        </div>
            <h2><a href="<?php the_permalink();?>"> <?php the_title() ?> </a> </h2>
            <p class="post-info"><?php the_time('F jS, Y g:i a'); ?> | By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php  the_author(); ?> </a>
                | posted In <?php
                            $categories = get_the_category();
                            $separator = ", ";
                            $output = '';

                            if ($categories){
                                foreach($categories as $category){
                                    $output .= '<a href="'. get_category_link($category->term_id) .'">' . $category->cat_name . '</a>' . $separator;

                                }
                                echo trim($output, $separator);
                            }
                            
                            ?>
            </p>
			<!-- <?php if($post->post_excerpt){ ?>
                <p>
                <?php echo get_the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>"> Read more&raquo; </a> 
           </p>
            
            <?php } else {
                the_content();
            } ?> -->

            <!-- <div class="imgbox"> <img class="center-fit" src='<?php echo get_the_post_thumbnail();?>'>  </div> -->
            
            
            <p>
                <?php echo get_the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>"> Read more&raquo; </a> 
           </p>

		</article>
	</div>
    <?php endwhile;
    else:
        echo '<p> No content found </p>';
    endif;

get_footer();
?>
