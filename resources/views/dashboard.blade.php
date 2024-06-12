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

        @include('Resources.sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Menu</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">30</h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fas fa-utensils menu-icon"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Promo</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">10</h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-percent"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Testimoni</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">30</h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-comments"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Reservasi</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">10%</h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-receipt"></i></span>
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


</body>
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
</script>
    


</html>