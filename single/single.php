<?php get_header(); ?>
<section class="body">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<article class="col-md-7 entry">

					<?php while ( have_posts() ) : the_post();?>
						<h3><?php the_title(); ?></h3>
						<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

						<article><?php the_content(); ?></article>
					<?php endwhile; // End Loop
					?>

				</article>
				<?php get_sidebar('homepage'); ?>

			</div>
		</div>
	</div>

	

</section>

<?php get_footer(); ?>