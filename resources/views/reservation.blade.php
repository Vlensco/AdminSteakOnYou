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
                    <a href="/promo" href="javascript:void()" aria-expanded="false">
                      <i class="fa-solid fa-percent"></i> <span class="nav-text">&nbsp;Promo</span>
                    </a>
                    <a href="/testimonial" href="javascript:void()" aria-expanded="false">
                      <i class="fa-solid fa-comments"></i><span class="nav-text">&nbsp;Testimonial</span>
                    </a>
                    <a href="/reservation" href="javascript:void()" aria-expanded="false" class="active">
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
                        <li class="breadcrumb-item active"><a href="/reservation">Reservation</a></li>
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
                                    <h4 class="card-title">List Reservasi</h4>
                                    <a href="/addreservation" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Nama Orang Reservasi</th>
                                                <th>Email</th>
                                                <th>Total Orang</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($reservation as $rs) { ?>
                                                <td>
                                                    <?= $rs['name']; ?>
                                                </td>
                                                <td>
                                                    <?= $rs['email']; ?>
                                                </td>
                                                <td>
                                                    <?= $rs['total_guest']; ?>
                                                </td>
                                                <td>
                                                    <?= $rs['date']; ?>
                                                </td>
                                                <td>
                                                    <?= $rs['time']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($rs['is_admin_validate'] == 0) { ?>
                                                        <span class="badge badge-warning">Waiting approval</span>
                                                    <?php } else if ($rs['is_admin_validate'] == 1) { ?>
                                                        <span class="badge badge-success">Approved</span>
                                                    <?php } else if ($rs['is_admin_validate'] == 2) {
                                                        ?> <span class="badge badge-danger">Rejected</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($rs['is_admin_validate'] == 0) { ?>
                                                        <button class="btn btn-success btn-sm" onclick="approveReservation('<?= $rs['id_reserve']; ?>', 'approve')">Approve</button>
                                                        <button class="btn btn-warning btn-sm" onclick="approveReservation('<?= $rs['id_reserve']; ?>', 'reject')">Reject</button>
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="deleteReservation('<?= $rs['id_reserve']; ?>', '<?= $rs['nama_feedback']; ?>')">Hapus</button>
                                                    <?php } else if ($rs['is_admin_validate'] == 1) { ?>
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="deleteReservation('<?= $rs['id_reserve']; ?>', '<?= $rs['nama_feedback']; ?>')">Hapus</button>
                                                    <?php } else if ($rs['is_admin_validate'] == 2) { ?>
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="deleteReservation('<?= $rs['id_reserve']; ?>', '<?= $rs['nama_feedback']; ?>')">Hapus</button>
                                                    <?php } ?>
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

        function deleteReservation(id, nama) {
            Swal.fire({
                title: `Hapus Data`,
                text: `Apakah kamu yakin mau menghapus testimonial ${nama} ?`,
                showDenyButton: true,
                icon: 'question',
                confirmButtonText: "Ya, hapus",
                denyButtonText: `Batal`,
            }).then((result) => {
                if (result.isConfirmed) {
                    let formData = new FormData();
                    formData.append('id_reserve', id);
                    $.ajax({
                        type: "POST",
                        url: "/deletereservation",
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

        function approveReservation(id, status) {
            if (status == 'approve') {
                message = `Apakah kamu yakin mau menerima reservasi ini ?`;
            } else {
                message = `Apakah kamu yakin mau menolak reservasi ini ?`;
            }
            Swal.fire({
                title: `Approve Reservation`,
                text: `${message}`,
                showDenyButton: true,
                icon: 'question',
                confirmButtonText: "Ya",
                denyButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    if (status == 'approve') {
                        status_code = 1;
                    } else {
                        status_code = 2;
                    }
                    let formData = new FormData();
                    formData.append('id_reserve', id);
                    formData.append('is_admin_validate', status_code);
                    $.ajax({
                        type: "POST",
                        url: "/approvereservation",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            console.log(response);
                            if (response.IS == true) {
                                window.location.reload();
                            } else {
                                window.location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        },
                    });
                }
            });
        }
    </script>
</body>

</html>