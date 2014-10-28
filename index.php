
<?php get_header(); ?>

<section class="body">
	<div id="banner">
		<img src="<?= get_template_directory_uri() . '/img/banner.jpg'?>"/>
	</div>
	<div id="banner-title">
		<div class="title">
			<!--Using a quote API -->
			<?php $quoteAPI = add_quote();?>
			<h3><?= $quoteAPI->body->quote; ?> </h3>
			<p>- <?= $quoteAPI->body->author; ?></p>
		</div>
	</div>
	<div id="banner-back">
	</div>
	<div id="content" class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="heading col-md-12">
						<span class="glyphicon glyphicon-th"></span><h3>MOST RECENT ARTICLES</h3>
					</div>
				</div>
				<div></div>
				<div id="recent-posts" class="row">
					<article class="col-md-12">
			        	<div class="row">

					<?php 
					// Check if there are any posts to display
					if ( have_posts() ) : ?>

						<?php
						// The Loop
						query_posts($query_string.'&posts_per_page=4');
						$counter = 0;
						while ( have_posts() ) : the_post();?>
				       	 		<div class="col-md-12">
				        			<div class="row">

					          			<article class=" post">
					          				<div class="thumb col-md-2">
										      	<?
												if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
												?>
											          	<a href="#" class="thumbnail">
														  <?php the_post_thumbnail(array(500,500)); ?>
													    </a>
										        <? }?>
										    </div>
										    <div class="post-content col-md-10">
												<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
												<small><?php the_time('F jS, Y') ?> </small>
									            <p><?php the_excerpt(); ?></p>
										          <!-- <p><a class="btn btn-default" href="#" role="button">View details »</a></p> -->
										    </div>
										     
								        </article>

						      			
									</div>
							      </div>
				       			  <?$counter += 1?>
							      <?php echo $counter % 2 == 0 ? "<div class='clear-both'></div>" : ''; ?>
						<?php endwhile; // End Loop

					else: ?>
						<p>Sorry, no posts matched your criteria.</p>
					  	</div>
				<?php endif; ?>
					</article>
		      </div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
