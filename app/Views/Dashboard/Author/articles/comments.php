<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>
<style>
    .card {
        border: none;
        border-radius: 4px;
    }


    .dots {
        height: 4px;
        width: 4px;
        margin-bottom: 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    .badge {

        padding: 7px;
        padding-right: 9px;
        padding-left: 16px;
        box-shadow: 5px 6px 6px 2px #e9ecef;
    }

    .user-img {

        margin-top: 4px;
    }

    .check-icon {

        font-size: 17px;
        color: #c3bfbf;
        top: 1px;
        position: relative;
        margin-left: 3px;
    }

    .form-check-input {
        margin-top: 6px;
        margin-left: -24px !important;
        cursor: pointer;
    }


    .form-check-input:focus {
        box-shadow: none;
    }


    .icons i {

        margin-left: 8px;
    }

    .reply {

        margin-left: 12px;
    }

    .reply small {

        color: #b7b4b4;

    }


    .reply small:hover {

        color: green;
        cursor: pointer;

    }
</style>
<div class="container pt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-11">
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center">
                        <img src="path_to_default_image.jpg" width="30" class="user-img rounded-circle mr-3">
                        <span>
                            <small class="font-weight-bold text-primary">username</small>
                            <br>
                            <small class="font-weight-bold">text</small>
                        </span>
                    </div>
                    <div>
                        <small>dibuat kapan</small>
                        <a href="#" class="btn btn-danger">Hapus</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
