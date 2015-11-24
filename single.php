<?php get_header(); ?>

<section id="main">
	<section id="articles_list">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php setPostViews(get_the_ID()); ?><!-- para contador de vistas-->
			<article>
				<hgroup><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></hgroup>
				<div class="date"><?php the_author_posts_link(); ?>: <?php the_time('jS F Y') ?> en <span><?php the_category();?></span></div>
				<div class="extract"><?php the_content();?></div>
			</article>
		<?php endwhile; else: ?>
			<h3>No se encontraron Articulos</h3>
		<?php endif; ?>

		<div id="comentarios">
			<h3>Comentarios</h3>
			<div id="caja_comentarios">
				<?php comments_template(); ?>
			</div>
		</div>
		
		<div id="post_relacionados">
			<?php
			    $tags = wp_get_post_tags($post->ID);
			    if ($tags) {
			    	$tag_ids = array();
			    	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
			    	$args=array(
			    	'tag__in' => $tag_ids,
			    	'post__not_in' => array($post->ID),
			    	'showposts'=>5, // Number of related posts that will be shown.
			    	'caller_get_posts'=>1
			    	);
			    $my_query = new wp_query($args);
			    	if( $my_query->have_posts() ) {
			    		echo '<h3>Artículos relacionados</h3><ul>';
			    		while ($my_query->have_posts()) {
			    			$my_query->the_post();
			    			?>
			    			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			    		<?php
			    		}
			    		echo '</ul>';
			    	}
			         wp_reset_query(); 
			    }
			?>
		</div>

	</section>
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>