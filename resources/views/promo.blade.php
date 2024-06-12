<!DOCTYPE html>
<html lang="en">

@include('Resources.head')

<body>
    @include('Resources.preloader')

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        @include('Resources.header')

        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <a href="/" href="javascript:void()" aria-expanded="false">
                      <i class="fa-solid fa-shapes"></i> <span class="nav-text">&nbsp;Dashboard</span>
                    </a>
                    <a href="/menu" href="javascript:void()" aria-expanded="false">
                      <i class="fas fa-utensils menu-icon"></i><span class="nav-text">&nbsp; Menu</span>
                    </a>
                    <a href="/promo" href="javascript:void()" aria-expanded="false" class="active">
                      <i class="fa-solid fa-percent"></i> <span class="nav-text">&nbsp;Promo</span>
                    </a>
                    <a href="/testimonial" href="javascript:void()" aria-expanded="false">
                      <i class="fa-solid fa-comments"></i><span class="nav-text">&nbsp;Testimonial</span>
                    </a>
                    <a href="/reservation" href="javascript:void()" aria-expanded="false">
                      <i class="fa-solid fa-receipt"></i><span class="nav-text">&nbsp;Reservation</span>
                    </a>
                </ul>
            </div>
        </div>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/promo">Promo</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title">List Promo</h4>
                                    <a href="/addpromo" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration text-center">
                                        <thead>
                                            <tr>
                                                <th>Promo Bulan</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($daftarPromo as $dp) { ?>
                                            <tr>
                                                <td>
                                                    <?= $dp['nama_promo']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <img style="width: 300px; max-width: 300px;"src="storage/theme/promo/<?= $dp['gambar_promo']; ?>" alt="">
                                                </td>
                                                <td>
                                                    <a href="/editpromo/<?= $dp['id_promo']; ?>"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="deletePromo('<?= $dp['id_promo']; ?>', '<?= $dp['nama_promo']; ?>')">Hapus</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        @include('Resources.footer')
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
                                            
    @include('Resources.script')

    <script>
        $(document).ready(function () {
            <?php if (session()->has('icon')) { ?>
            Swal.fire({
                icon: '<?= session('icon'); ?>',
                title: '<?= session('title'); ?>',
                text: '<?= session('message'); ?>'
            })
            <?php } ?>
        })

        function deletePromo(id, nama) {
            Swal.fire({
                title: `Hapus Data`,
                text: `Apakah kamu yakin mau menghapus promo ${nama} ?`,
                showDenyButton: true,
                icon: 'question',
                confirmButtonText: "Ya, hapus",
                denyButtonText: `Batal`,
            }).then((result) => {
                if (result.isConfirmed) {
                    let formData = new FormData();
                    formData.append('id_promo', id);
                    $.ajax({
                        type: "POST",
                        url: "/deletepromo",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            console.log(response);
                            if (response.status == true) {
                                window.location.reload();
                            } else {
                                window.location.reload();
                            }
                        },
                        error: function (data) {
                            window.location.reload();
                        },
                    });
                }
            });
        }
    </script>
</body>

</html>