<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventImage[]|\Cake\Collection\CollectionInterface $eventImages
 */
?>
<!-- spacer section -->
<section id="works" class="section">
    <div class="container-fluid clearfix">
        <div class="row-fluid">
            <div class="span12">
                <div  id="lightgallery">
<?php $i=0; foreach ($allImages as $img): ?>
                    <!-- portfolio item -->
                    <div class="pitem" data-ipath="<?= h($img) ?>" style="position:relative; padding: 20px;padding-top: 30px; margin:5px; border: 2px solid grey; width:auto; float:left;">
                        <div style="width:100%;  height:25px; position: absolute; right:0; margin-top:-25px;">
                            <div style="width:25px; float:left;"><i class="fa fa-trash"></i></div>
                            <div style="width:auto; float:right;">
                                Select<input name="imgselect[]" type="checkbox" >  A<input name="rad<?= $i ?>" type="radio" val="1" >M<input name="rad<?= $i ?>" type="radio" val="2" >C<input name="rad<?= $i ?>" type="radio" val="3" >
                                <div class="rotateleft" style="width:auto; margin:5px; color:black; height:25px; float:right;"><i class="fas fa-undo"></i></div>
                                <div class="rotateright" style="width:auto; margin:5px; color:black; height:25px; float:right;"><i class="fas fa-redo"></i></div>
                            </div></div>
                        <img class="albimg" style="height:150px; width:auto"  src="<?= "/album/webroot/media/thumbs/".h($img) ?>" />
                    </div>
                    <!-- end portfolio item -->
<?php $i++; endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="pagination" style="width:100%; margin-top: 25px; margin-bottom: -50px; height:25px; background-color: black;" >
        <?php for($i=0;$i<$totalPages;$i++){ ?>
        <div class="pagelm" data-pagenum="<?= $i; ?>" style="float:left;margin:0px 5px;width: 25px; height:22px; background-color: rgba(38, 125, 165,.8); color:white; text-align: center; padding: 2px 2px; cursor: pointer;"><?= ($i+1); ?></div>
        <?php } ?>
    </div>
</section>
<!-- end spacer section -->
<script>

    $(document).ready(function () {
        var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
        $(".rotateleft").click(function () {
            var ipath = $(this).closest(".pitem").data("ipath");
            var elm = $(this);
            $.ajax({
                type: "POST",
                url: "image/rotate",
                headers: {'X-CSRF-Token': csrfToken},
                data: {"ipath": ipath, "action": "rl"},
                success: function (opt) {
                    elm.closest(".pitem").find(".albimg").attr('src', "/album/webroot/media/thumbs/" + ipath + '?rand=' + getRand());
                }
            });

        });
        $(".rotateright").click(function () {
            var ipath = $(this).closest(".pitem").data("ipath");
            var elm = $(this);
            $.ajax({
                type: "POST",
                url: "image/rotate",
                headers: {'X-CSRF-Token': csrfToken},
                data: {"ipath": ipath, "action": "rr"},
                success: function (opt) {
                    elm.closest(".pitem").find(".albimg").attr('src', "/album/webroot/media/thumbs/" + ipath + '?rand=' + getRand());
                }
            });

        });
        $(".pagelm").click(function(){
            
            location.href="select/index/"+$(this).data("pagenum");
            
        });
        function getRand() {

            return Math.floor(Math.random() *100000);
        }

    });


</script>


