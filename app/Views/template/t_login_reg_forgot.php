<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />


</head>

<body>
    <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
    <?= $this->renderSection('content') ?>
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <script>
        function showValidationAlert(error) {
        let errors = [];
        let txt = '';
        const title = "Sorry";
        const icon = "info";

        for (let x in error) {
            errors.push(error[x]);
        }
        
        for (let x in errors) {
            if(errors.length > 1){
                if(x == errors.length - 1) {
                    txt += errors[x];
                } else {
                     txt += errors[x] + ', ' ;
                }
            } else {
                txt += errors[x];
            }
        }
      
        return confirmAlert(title, txt, icon);
    }
        // sweeta alert
        // tambah, edit, hapus
        const swal = $('.swal').data('swal');
        console.log(swal);
        if (swal == 'infoMessage') {
            confirmAlert("Maaf", "Username atau Password salah!", "info");
        } else if (swal == 'infoMessageForgetPass') {
            confirmAlert("Maaf", "Username atau Nomor HP salah!", "info");
        } else if (swal == 'infoMessageForgetPass2') {
            confirmAlert("Maaf", "Username atau kode OTP salah!", "info");
        } else if (swal == 'infoMessageForgetPass3') {
            confirmAlert("Berhasil", "Password telah diubah!", "success");
        } else if (swal == 'registerSuccess') {
            confirmAlert("Berhasil", "Registrasi berhasil", "success");
        } else if (swal == 'registerFailed') {
            confirmAlert("Gagal", "Registrasi gagal", "error");
        } else {
            let strArray = swal.split("-");
            if (strArray[0] == 'berhasil') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data berhasil ' + strArray[1],
                    showConfirmButton: false,
                    timer: 1500
                })
            } else if (strArray[0] == 'gagal') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Data gagal ' + strArray[1],
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }


        function confirmAlert($title, $text, $icon) {
            Swal.fire({
                title: $title,
                text: $text,
                icon: $icon
            });
        }
        // hapus
        $(document).on('click', '.btn-hapus', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        // end sweet alert 
    </script>
     <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
        <?php if(session('validation')): ?>
            <?php if(session('validation')->getErrors()): ?>
                <?php $error = session('validation')->getErrors();?>
                <script>
                    var errors = <?= json_encode($error) ?>;
                    showValidationAlert(errors);
                </script>
            <?php endif; ?>
        <?php endif; ?> 
</body>

</html>