<?php
/**
* A Simple Category Template
*/
	get_header(); ?> 

	<section id="category" class="body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class=" article col-md-7">
							<div class="content">
						
							<?php 
							// Check if there are any posts to display
							if ( have_posts() ) : ?>
										<?php
										// The Loop
										$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

										query_posts($query_string.'&posts_per_page=5');
										
										$counter = 0;

										while ( have_posts() ) : the_post();?>
						          			<article class="post">
						          				<div class="thumb col-md-2 col-sm-2 col-xs-2">
											      	<?
													if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
													?>
												          	<a href="#" class="thumbnail">
															  <?php the_post_thumbnail(array(500,500)); ?>
														    </a>
											        <? }?>
											    </div>
											    <div class="post-content col-md-10 col-sm-10 col-xs-10">
													<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
													<small><?php the_time('F jS, Y') ?> </small>
										            <p><?php the_excerpt(); ?></p>
											          <!-- <p><a class="btn btn-default" href="#" role="button">View details »</a></p> -->
											    </div>
											     
									        </article>
						       			  	<?$counter += 1?>
										<?php endwhile; // End Loop?>
											<!-- Add the pagination functions here. -->
											<div class="col-md-12 pagination">
												<?php kriesi_pagination();?>
											</div>
										<?else: ?>
						          			<article class="post">
												<p>Sorry, no posts matched your criteria.</p>
									        </article>
										<?php endif; ?>

								  	</div>

					</div>

					<?php get_sidebar('homepage'); ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
