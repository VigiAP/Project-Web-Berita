<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">

            <form action="<?= base_url('author/save_article'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <input type="hidden" name="id_user" class="form-control" placeholder="Judul ..." value="<?=session()->get('id')?>">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                     
                     
                    <div class="form-group">
                        <textarea id="summernote" name="content">

                        </textarea>
                    </div>
                     <div class="form-group">
                        <label>Genre</label>
                        <div class="col-md-6"> 
                            <select id="choices-multiple-remove-button" placeholder="Select category" multiple name="category[]">
                                <?php foreach ($categories as $category):?>
                                <option value="<?= $category['id_category'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach;?>
                            </select> 
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('author/article'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>