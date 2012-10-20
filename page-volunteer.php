<?php
/*
Template Name: Volunteer Stories
*/
?>

<?php get_header(); ?>

<div id="container">

	<div id="featureimg"><?php the_post_thumbnail( 'page-feature' ); ?></div>

	<div id="content" class="left">
	
		<div class="postarea">
							
			<?php $wp_query = new WP_Query(array('category_name'=>'volunteer','posts_per_page'=>'10')); ?>
			<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php global $more; $more = 0; ?>
            
            <h1 id="blogtitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				
            <div class="postauthor">
            	<p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?></p>   
            </div>
            
		  <div id="primary_image">
				<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
			</div>
            <?php the_content(__("Read More", 'organicthemes')); ?><div style="clear:both;"></div>
            				
			<div class="postmeta">
				<p><?php _e("Tags:", 'organicthemes'); ?> <?php the_tags('') ?></p>
			</div>
							
			<?php endwhile; ?>
			
			<div id="pagination">
                <div id="prevLink"><p><?php previous_posts_link(); ?></p></div>
                <div id="nextLink"><p><?php next_posts_link(); ?></p></div>
            </div>
            
            <?php else : // do not delete ?>

            <h3><?php _e("Page not Found", 'organicthemes'); ?></h3>
            <p><?php _e("We're sorry, but the page you're looking for isn't here.", 'organicthemes'); ?></p>
            <p><?php _e("Try searching for the page you are looking for or using the navigation in the header or sidebar", 'organicthemes'); ?></p>

			<?php endif; // do not delete ?>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<?php get_footer(); ?>