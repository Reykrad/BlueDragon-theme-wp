<?php get_header(); ?>

<section id="main">
	<section id="articles_list">
		<?php
			if(have_posts()) the_post();
			if(get_the_author_meta('description')):
		?>
		<h2>Author Posts y Bio - <?php echo get_the_author(); ?></h2>
		<p><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 60 ) ); ?></p>
		<p><strong>Author Since: </strong><?php echo the_author_meta('user_registered'); ?></p>
		<p><strong>Website: </strong><a href="<?php echo the_author_meta( 'user_url' ); ?>"><?php echo the_author_meta( 'user_url' ); ?></a></p>
		<p><strong>Bio: <?php echo the_author_meta('description'); ?></strong></p>
		<h3>Posts de <?php echo get_the_author(); ?>:</h3>
		<?php endif;
			rewind_posts();
		?>
		<ul>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<li>
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>, 
				<?php the_time('d M Y'); ?> en <?php the_category('&');?>
			</li>
		<?php endwhile; else: ?>
		<p><?php _e('El Autor no tiene Posts'); ?></p>
		</ul>
		<?php endif; ?>

		<div id="pagination">
			<p>
				<?php next_posts_link('Post Siguientes'); ?>
				<?php previous_posts_link('Post Anteriores'); ?>
			</p>
		</div>
	</section>
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>