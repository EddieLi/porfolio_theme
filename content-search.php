<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Shape
 * @since Shape 1.0
 */
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 search-result">
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
	</div>

