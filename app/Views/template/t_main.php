<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

   

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminLteDist/css/adminlte.min.css'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Summernote -->
    <link rel="stylesheet" href="<?= base_url('/plugins/summernote/summernote-bs4.min.css'); ?>">

    <!-- multiple select -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
     <!-- my css -->
    <link rel="stylesheet" href="<?=base_url()?>/css/myCss.css">
    <style>
        #choices-multiple-remove-button:hover {
            color: black;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed dark-mode">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Accounts/logout'); ?>" class="nav-link" role="button" data-widget=""><i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </nav>;
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="/" class="brand-link">
                <span class="ml-4 brand-text font-weight-light">Pojok Berita</span>
            </a>
            <!-- Sidebar -->
            <?= $this->include('template/sidebar'); ?>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <?php if(session('validation')) {?>
                <?php if(session('validation')->getErrors()) {?>
                    <?php $error = session('validation')->getErrors();?>
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 text-center" role="alert">
                        <?php foreach($error as $key => $value): ?>
                                <p class="font-bold"><?= $value;?></p>
                        <?php endforeach;?>
                    </div>
                <?php }?>
            <?php }?>
            <?= $this->renderSection('konten'); ?>
            <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2024.</strong>
            All rights reserved.
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('plugins/sparklines/sparkline.js'); ?>"></script>

    <!-- daterangepicker -->
    <script src="<?= base_url('plugins/moment/moment.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminLteDist/js/adminlte.js'); ?>"></script>
    <!-- table -->
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.j'); ?>s"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/jszip/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
    <script src="<?= base_url('/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<<<<<<< HEAD
    
=======
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
>>>>>>> 7cd6b097090b1fcb2c6d1398cb68a0f18b432e7e
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
     <script>
        $(document).ready(function(){
    
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                // maxItemCount:5,
                // searchResultLimit:5,
                // renderChoiceLimit:5
            }); 
            
            
        });
        // sweeta alert
        // tambah, edit, hapus
        const alert = $('.swal').data('swal');
        if (alert == 'passwordChanged') {
            confirmAlert("Berhasil", "Password berhasil diubah", "success");
        } else if (alert == 'passwordNotSame') {
            confirmAlert("Maaf", "Password tidak sama", "info");
        } else if (alert == 'success') {
            confirmAlert("Berhasil", "Data berhasil disimpan", "success");
        } else if (alert == 'gagal') {
            confirmAlert("Gagal", "Data berhasil disimpan", "info");
        } else if (alert == 'successHapus') {
            confirmAlert("Berhasil", "Data berhasil dihapus", "success");
        } else if (alert == 'gagalHapus') {
            confirmAlert("Berhasil", "Data gagal dihapus", "success");
        }else {
            let strArray = alert.split("-");
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
    <script>
    // sweeta alert
    // tambah, edit, hapus
    const swal = $('.swal').data('swal');
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
    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
      search: true
    });
    // script menampilkan foto hal add users
    function displaySelectedImage(event, elementId) {
      const selectedImage = document.getElementById(elementId);
      const fileInput = event.target;

      if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
          selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
      }
    }
    // end script menampilkan foto hal add users
  </script>

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
</body>

</html>