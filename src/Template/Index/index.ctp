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
                <div  id="lightgallery">
<?php foreach ($allImages as $img): ?>
                    <!-- portfolio item -->
                    <a href="<?= "webroot/media/images/".h($img) ?>">
                        <img  src="<?= "webroot/media/thumbs/".h($img) ?>" />
                    </a>
                    <!-- end portfolio item -->
<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end spacer section -->


<script type="text/javascript">
    $(document).ready(function () {
        $("#lightgallery").lightGallery({});
    });
</script>

