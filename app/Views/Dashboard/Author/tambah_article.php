<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">

            <form action="<?= base_url('author/simpan'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul_berita" class="form-control" placeholder="Judul ..."
                            value="<?= old('judul_berita'); ?>">
                    </div>
                    <div class="form-group">
                            <label>Genre</label>
                            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                            <select name="genre[]" class="form-control select2" multiple="multiple" placeholder="Genre ...">
                                <option value="">testing</option>
                                <option value="">testing</option>
                                <option value="">testing</option>
                            </select>
                            <script>
                                $(document).ready(function() {
                                    $('.select2').select2({
                                        placeholder: "Genre....",
                                    });
                                });
                            </script>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="foto_berita" class="custom-file-input" id="exampleInputFile"
                                    value="<?= old('foto_berita'); ?>">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="summernote" name="isi_berita">

                        </textarea>
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