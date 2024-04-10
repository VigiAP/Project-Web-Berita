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
                        <input type="text" name="tiltle" class="form-control" placeholder="Judul ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                     
                     
                    <div class="form-group">
                        <textarea id="summernote" name="content">

                        </textarea>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                            <label>Select Multiple</label>
                            <select name="categories[]" class="form-control select2" multiple="multiple" placeholder="Genre ...">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $('.select2').select2({
                                        placeholder: "Genre....",
                                    });
                                });
                            </script>
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