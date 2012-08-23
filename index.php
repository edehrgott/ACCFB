?php get_header(); ?>

<div id="container">

  <div id="content" class="left">
  
    <div class="postarea">
    
      	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>      
      
      	<h1><?php the_title(); ?></h1>
      
      	<div class="postauthor">
            <p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'organicthemes'); ?> <?php the_time(__("l, F j, Y", 'organicthemes')); ?></p>
      	</div>
      
      	<?php the_content(__("Read More", 'organicthemes'));?>
      	<div class="clear"></div>
      
      	<!--<?php trackback_rdf(); ?>-->
      
    </div>
    
    <div id="postnav">
		<div id="prevLink"><p><?php next_post_link('%link', __("&laquo; Newer Entry", 'organicthemes'), TRUE); ?></p></div>
        <div id="nextLink"><p><?php previous_post_link('%link', __("Older Entry &raquo;", 'organicthemes'), TRUE); ?></p></div>
    </div>
    
    <div class="postcomments">
    	<?php comments_template('',true); ?>
    </div>
    
    <?php endwhile; else: ?>
    <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
    <?php endif; ?>   
    
  </div>
  
  <?php include(TEMPLATEPATH."/sidebar.php");?>
  
</div>

<?php get_footer(); ?>