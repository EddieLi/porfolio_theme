<?php 

/*
This is taken out because I don't think slider is any bit useful
However, this is archived for future use or reference

*/
?>
<!-- Slider -->
				<div id="carousel-generic" class="carousel slide" data-ride="carousel">
			        
			        <div class="carousel-inner">
				             <?php
					            $args = array( 'post_type' => 'slider', 'order' => "ASC" );
								$loop = new WP_Query( $args );
								$countposts = 0;

								while ( $loop->have_posts() ) : $loop->the_post();
						  	?>

						    <?php if ($countposts == 0) {?>
								<div class="item active" data-src=''>
							<?php }else{ ?>
								<div class="item " data-src=''>
							<?php } ?>
									
									<div class="item-featured-thumb">
										<?php the_post_thumbnail("full");?> 
									</div>
									<div class="item-content ">
										<div class="carousel-caption">
											<?php $key = get_post_meta($post->ID)?>
											<h3><a href="<?php echo $key['Link'][0]; ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											<p class="lead"><?php the_excerpt();?></p>
										</div>
									</div>
								</div>
								<?php $countposts++ ?>
							<?php endwhile; ?>

				        
			      	</div>
			      	<a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
			          <span class="glyphicon glyphicon-chevron-left"></span>
			        </a>
			        <a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
			          <span class="glyphicon glyphicon-chevron-right"></span>
			        </a>
			      	<ol class="carousel-indicators">
			      		<?php
					        $args = array( 'post_type' => 'slider' );
							$loop = new WP_Query( $args );
							$countposts = 0;
							while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<?php if ($countposts == 0) {?>
			          		<li data-target="#carousel-generic" data-slide-to="<?php echo $countposts; ?>" class="active"></li>
						<?php }else{ ?>
			          		<li data-target="#carousel-generic" data-slide-to="<?php echo $countposts; ?>" class=""></li>
						<?php } ?>

			          	<?php $countposts++?>
						<?php endwhile; ?>

			        </ol>
	            </div>
				<!-- Slider -->