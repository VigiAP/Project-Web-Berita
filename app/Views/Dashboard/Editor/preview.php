<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>
<div class="container py-2">


    <div class="row">
        <div class="col-lg-10 mx-auto">

            <!-- List group-->
            <ul class="list-group shadow">

                <!-- list group item-->
                <li class="list-group-item my-2">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">Judul artikel</h5>
                            <p class="font-italic text-muted mb-0 small">isi artikel dalam beberapa kalimat</p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">Nama Author</h6>
                                <div class="list-inline">

                                    <a href="" class="btn btn-success btn-sm"><i
                                            class="nav-icon fa-solid fa-check"></i>Approve</a>
                                    <a href="" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this item?')"><i
                                            class="nav-icon fa fa-trash"></i> Delete</a>
                                    <a href="<?= base_url('editor/preview_article'); ?>" class="btn btn-primary btn-sm">Preview</a>

                                </div>
                            </div>
                        </div><img src="https://bootstrapious.com/i/snippets/sn-cards/shoes-1_gthops.jpg"
                            alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div>
                    <!-- End -->
                </li>
                <!-- End -->

                <!-- list group item-->
                <li class="list-group-item my-2">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">Judul artikel</h5>
                            <p class="font-italic text-muted mb-0 small">isi artikel dalam beberapa kalimat</p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">Nama Author</h6>
                                <div class="list-inline">

                                    <a href="" class="btn btn-success btn-sm"><i
                                            class="nav-icon fa-solid fa-check"></i>Approve</a>
                                    <a href="" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this item?')"><i
                                            class="nav-icon fa fa-trash"></i> Delete</a>
                                            <a href="" class="btn btn-primary btn-sm">Preview</a>

                                </div>
                            </div>
                        </div><img src="https://bootstrapious.com/i/snippets/sn-cards/shoes-1_gthops.jpg"
                            alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div>
                    <!-- End -->
                </li>
            </ul>
            <!-- End -->
        </div>
    </div>
</div>


<?= $this->endSection(); ?>