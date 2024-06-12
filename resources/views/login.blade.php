
<!DOCTYPE html>
<html class="h-100" lang="en">

@include('Resources.head')

<body class="h-100">
    
    @include('Resources.preloader')

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="/login"> <h4>Login Admin</h4></a>
                                <form class="mt-5 mb-5 login-input" action="/login" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="form-group">
                                        <input type="username" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="theme/plugins/common/common.min.js"></script>
    <script src="theme/js/custom.min.js"></script>
    <script src="theme/js/settings.js"></script>
    <script src="theme/js/gleek.js"></script>
    <script src="theme/js/styleSwitcher.js"></script>
</body>
</html>





