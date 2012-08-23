<?php get_header(); 

$primary_tag = 'primary';
$secondary_tag= 'secondary';?>

<div id="content" class="home">
    
	<div id="homeslider">
        <ul id="slider1">
            <?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_slider'),'showposts'=>of_get_option('postnumber_slider'))); ?>
            <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
            <?php global $more; $more = 0; ?>
            <li>
            	<?php if(of_get_option('display_slideinfo') == '1') { ?>
            	<div class="slideinfo">
            	    <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            	    <?php the_excerpt(); ?>
            	</div>
            	<?php } else { ?>
            	<?php } ?>
            	<div class="clear"></div>
                <?php if ( $video ) : ?>
                    <div class="feature_video"><?php echo $video; ?></div>
                <?php else: ?>
                    <a class="feature_img" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-feature' ); ?></a>
                <?php endif; ?>
            </li>
            <?php endwhile; ?>
            <?php else : // do not delete ?>
            <?php endif; // do not delete ?>
        </ul>
    </div>

	<?php if(of_get_option('display_homeblog') == '1') { ?>
    <div id="homepage">
            
    	<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_homeblog'),'showposts'=>of_get_option('postnumber_homeblog'))); ?>
		<?php $post_class = 'first'; ?>
        <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
        <?php global $more; $more = 0; ?>
        
            <div class="homebox <?php echo $post_class; ?>">
                
                <?php
					if ('first' == $post_class){
					  $post_class = 'second';
					}elseif ('second' == $post_class){
					  $post_class = 'third';
					}elseif ('third' == $post_class){
					  $post_class = 'fourth';
					}else{
					  $post_class = 'first';
					}
				?>
                        			
                <?php if ( $video ) : ?>
              		<div class="home_video"><?php echo $video; ?></div>
				<?php else: ?>
                    <div class="home_img"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-thumbnail' ); ?></a></div>
                <?php endif; ?>
                
                <div class="homeboxinfo">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </div>
                
            </div>
            
		<?php endwhile; ?>
        <?php else : // do not delete ?>
        <?php endif; // do not delete ?>
        
	</div>
   	<?php } else { ?>
    <?php } ?>
    
	<div id="home_articles">    
	<div id="primary">
		<?php
		 $new_posts = get_posts("tag=$primary_tag&numberposts=1"); 
		 foreach($new_posts as $post){
			setup_postdata($post);
			echo get_post_meta(get_the_id(),'image_desc',true);?>
			<div id="primary_title">
			    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div id="primary_image">
				<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
			</div>
			<div id="primary_meta">
			    by <?php the_author(); ?>, posted on <?php the_time('l, F jS, Y'); ?> | <?php comments_number(__('No Comments', 'lambdaliterary'), __('1 Comment', 'lambdaliterary'), '% ' . __('Comments', 'lambdaliterary'));?><br />
			 </div>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>">Read More</a>
			<div class="fix"></div>
		 <?php } ?>
	</div>
	
	<div id="secondary">
		<?php
		  $sec_posts = get_posts("tag=$secondary_tag&numberposts=1"); 
		  foreach($sec_posts as $post){
			 setup_postdata($post);
			 echo get_post_meta(get_the_id(),'image_desc',true);?>
			 <div id="secondary_title">				
				 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			 </div>
			<div id="secondary_image">
				<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
			</div>			 
			 <div id="secondary_meta">
				by <?php the_author(); ?>, posted on <?php the_time('l, F jS, Y'); ?> | <?php comments_number(__('No Comments', 'lambdaliterary'), __('1 Comment', 'lambdaliterary'), '% ' . __('Comments', 'lambdaliterary'));?><br />
			  </div>
			 <?php the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
			 the_excerpt(); ?>
			 <a href="<?php the_permalink(); ?>">Read More</a>
			<div class="fix"></div>			 
		  <?php } ?>  
	</div>
	
	<div id="home_sidebar">
 
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home-sidebar') ) : ?>
    	
		<div class="widget">
            <h4><?php _e("Widget Area", 'accfb'); ?></h4>
            <p><?php _e("This section is widgetized. To add widgets here, go to the", 'organicthemes'); ?> <a href="<?php echo admin_url(); ?>widgets.php"><?php _e("Widgets", 'organicthemes'); ?></a> <?php _e("panel in your WordPress admin, and add the widgets you would like to the", 'organicthemes'); ?> <strong><?php _e("Sidebar", 'organicthemes'); ?></strong>.</p>
            <p><small><?php _e("*This message will be overwritten after widgets have been added.", 'organicthemes'); ?></small></p>
        </div>
		
	<?php endif; ?>
	
	<div class="fix"></div>			 	
	</div>
	</div>

</div>

<?php get_footer(); ?>