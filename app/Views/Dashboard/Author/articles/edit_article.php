<?= $this->extend('/template/t_main'); ?>
<?= $this->section('konten'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="card-body">
            <form action="<?= base_url('author/update_article'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?=$article[0]['id_article']?>?>">
                    <input type="hidden" name="id_user" value="<?=session()->get('id')?>">
                    <input type="hidden" name="old_image" value="<?=$article[0]['image']?>">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul ..." value="<?=$article[0]['title']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile" class="d-block">Gambar</label>
                        <img src="<?= base_url('img/')?>/<?= $article[0]['image']; ?>" class="img-thumbnail mb-2" width="50px">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="new_image" class="custom-file-input" id="exampleInputFile" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <textarea id="summernote" name="content">
                            <?= $article[0]['content']; ?>
                        </textarea>
                    </div>
                     <div class="form-group">
                        <label>Genre</label>
                        <div class="col-md-6"> 
                            <select id="choices-multiple-remove-button" placeholder="Select category" multiple name="category[]">                      
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id_category'] ?>" 
                                        <?php foreach($selectedCategory as $data): ?>
                                            <?= $category['id_category'] == $data['id_category'] ? 'selected' : '' ?>
                                        <?php endforeach; ?>
                                    ><?= $category['name'] ?></option>
                                <?php endforeach; ?>
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