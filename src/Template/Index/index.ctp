<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventImage[]|\Cake\Collection\CollectionInterface $eventImages
 */
?>
<!-- spacer section -->
	<section id="works" class="section">
		<div class="container clearfix">
			<h4>Our Works</h4>
			<!-- portfolio filter -->
			<div class="row">
				<div id="filters" class="span12">
					<ul class="clearfix">
						<li>
							<a href="#" data-filter="*" class="active">
								<h5>All</h5>
							</a>
						</li>
						<li>
							<a href="#" data-filter=".web">
								<h5>Ab</h5>
							</a>
						</li>
						<li>
							<a href="#" data-filter=".print">
								<h5>Me</h5>
							</a>
						</li>
						<li>
							<a href="#" data-filter=".design">
								<h5>Common</h5>
							</a>
						</li>
						
					</ul>
				</div>
				<!-- END PORTFOLIO FILTERING -->
			</div>
			<div class="row">
				<div class="span12">
					<div id="portfolio-wrap">
                                             <?php foreach ($allImages as $img):
                                                
                                                 ?>
						<!-- portfolio item -->
						<div class="portfolio-item grid print photography">
							<div class="portfolio">
								<a href="<?= "webroot/media/images/".h($img) ?>" data-pretty="prettyPhoto[gallery1]" class="portfolio-image">
						<img src="<?= "webroot/media/images/".h($img) ?>" alt="" />
						<div class="portfolio-overlay">
							<div class="thumb-info">
								<h5>Portfolio name</h5>
								<i class="icon-plus icon-2x"></i>
							</div>
						</div>
						</a>
							</div>
						</div>
						<!-- end portfolio item -->
                                                 <?php endforeach; ?>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->