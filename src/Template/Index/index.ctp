<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventImage[]|\Cake\Collection\CollectionInterface $eventImages
 */
?>
<!-- spacer section -->
<section id="works" class="section">
    <div class="container clearfix">

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

