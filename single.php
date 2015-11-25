<?php get_header(); ?>

<section id="main">
	<section id="articles_list">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php setPostViews(get_the_ID()); ?><!-- para contador de vistas-->
			<article>
				<hgroup><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></hgroup>
				<div class="date"><?php the_author_posts_link(); ?>: <?php the_time('F j, Y') ?> en <span><?php the_category();?></span></div>
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
	</section>
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>