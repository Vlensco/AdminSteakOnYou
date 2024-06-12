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
                    <a href="/menu" href="javascript:void()" aria-expanded="false" class="active">
                      <i class="fas fa-utensils menu-icon"></i><span class="nav-text">&nbsp; Menu</span>
                    </a>
                    <a href="/promo" href="javascript:void()" aria-expanded="false">
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Menu</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Menu</h4>
                                <div class="basic-form">
                                    <form action="/saveeditedmenu" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="id_menu" value="<?= $menu->id_product ?>">
                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <input required type="text" name="nama" class="form-control"
                                                    placeholder="Nama Menu" value="<?= $menu->nama?>">
                                            </div>
                                            <div class="col-12 mt-4">
                                                <select required name="kategori" id="kategori" class="form-control">
                                                    <option value="" selected disabled>Pilih Kategori</option>
                                                        <option value="Steak" <?php if ($menu->kategori == "Steak") {
                                                            echo "selected";
                                                        } ?>>Steak</option>
                                                        <option value="Snack & Additional" <?php if ($menu->kategori == "Snack & Additional"){
                                                            echo "selected";
                                                        }?>> Snack & Additional</option>
                                                        <option value="Drink & Beverages" <?php if ($menu->kategori == "Drink & Beverages"){
                                                            echo "selected";
                                                        }?>> Drink & Beverages</option>
                                                </select> 
                                            </div>
                                            <div class="col-12 mt-4">
                                                <input required type="number" name="harga" class="form-control"
                                                    placeholder="Harga Menu" value="<?= $menu->harga?>">
                                            </div>
                                        </div>
                                        <a href="/menu" class="btn btn-primary mt-4" >Back</a>
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