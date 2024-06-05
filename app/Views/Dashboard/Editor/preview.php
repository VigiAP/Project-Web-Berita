<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>
<div class="container py-2">


    <div class="row">
        <div class="col-lg-10 mx-auto">

            <!-- List group-->
            <ul class="list-group shadow">

                <!-- list group item-->
                <?php foreach($articles as $article):?>
                     <li class="list-group-item my-2">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2"><?=$article['title']?></h5>
                            <p class="font-italic text-muted mb-0 small"><?=limit_words(strip_tags($article['content']), 30);?></p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2"><?=$article['name']?></h6>
                                <div class="list-inline">
                                    <a href="<?= base_url('editor/aproveArticle/'.$article['id_article'].'/yes'); ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to aprove this item?')"><i
                                            class="nav-icon fa-solid fa-check"></i>Approve</a>
                                    <a href="<?= base_url('editor/aproveArticle/'.$article['id_article'].'/not'); ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')"><i
                                            class="nav-icon fa fa-xmark"></i> Not Approve</a>
                                    <a href="<?= base_url('editor/preview_article/'.$article['id_article']); ?>" class="btn btn-primary btn-sm">Preview</a>

                                </div>
                            </div>
                        </div>
                            <?php if($article['image']){?>
                                <img src="<?= base_url('img/')?>/<?= $article['image']; ?>"
                                    alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                            <?php }?>
                        </div>
                    <!-- End -->
                </li>
                <?php endforeach;?>
                <!-- End -->
            </ul>
            <!-- End -->
        </div>
    </div>
</div>


<?= $this->endSection(); ?>