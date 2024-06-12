<!DOCTYPE html>
<html lang="en">

@include('Resources.headedit')

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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Promo</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Promo</h4>
                                <div class="basic-form">
                                    <form action="/saveeditedpromo" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="id_promo" value="<?= $promo->id_promo ?>">
                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <input required type="text" name="nama" class="form-control"
                                                    placeholder="Nama Menu" value="<?= $promo->nama_promo?>">
                                            </div>
                                            <div class="col-12 mt-4">
                                                <input required type="file" name="gambar" class="form-control"
                                                    value="<?= $promo->gambar_promo ?>">
                                            </div>
                                        </div>
                                        <a href="/promo" class="btn btn-primary mt-4" >Back</a>
                                        <button class="btn btn-primary mt-4" type="submit">Submit</button>
                                    </form>
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

    @include('Resources.scriptedit')
</body>

</html>