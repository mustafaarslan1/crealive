
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>Crealive Blog Yönetim Paneli</title>
		<meta name="description" content="crealive blog yönetim paneli" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

		<!--begin::Main-->
        <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                <!--begin: Aside Container-->
                <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                    <!--end::Logo-->
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center">
                        <!--begin::Signin-->
                        <div class="login-form login-signin py-11">
                            <!--begin::Form-->
                            <form class="form general-form" action="{{route('login-form')}}" method="POST">
                                @csrf
                                <!--begin::Title-->
                                <div class="text-center pb-8">
                                    <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Giriş Yap</h2>
                                </div>
                                <!--end::Title-->
                                <!--begin::Form group-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="username" autocomplete="off">
                                    <div class="fv-plugins-message-container"></div></div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group fv-plugins-icon-container">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Şifre</label>
                                    </div>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off">
                                    <div class="fv-plugins-message-container"></div></div>
                                <!--end::Form group-->
                                <!--begin::Action-->
                                <div class="text-center pt-2">
                                    <button id="kt_login_signin_submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">Giriş Yap</button>
                                </div>
                                <!--end::Action-->
                                <input type="hidden"><div></div></form>
                            <!--end::Form-->
                        </div>
                        <!--end::Forgot-->
                    </div>
                    <!--end::Aside body-->
                    <!--begin: Aside footer for desktop-->
                    <!--end: Aside footer for desktop-->
                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->
            <!--begin::Content-->
            <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
                <!--begin::Title-->
                <div class="d-flex flex-column justify-content-center text-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
                    <h3 class="display4 font-weight-bolder my-7 text-dark" style="color: #986923;">Crealive Blog</h3>
                    <p class="font-weight-bolder font-size-h2-md font-size-lg text-dark opacity-70">
                        Yönetim Paneline Hoşgeldiniz
                    </p>
                </div>
                <!--end::Title-->
                <!--begin::Image-->
                <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(/media/svg/illustrations/login-visual-2.svg);">

                </div>
                <!--end::Image-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
		<!--end::Main-->
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="/plugins/global/plugins.bundle.js"></script>
		<script src="/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
        <script src="/js/custom.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
			KTApp.blockPage({
			overlayColor: '#000000',
			state: 'danger',
			message: 'Lütfen Bekleyin...'
			});
			$(document).ready(function(){
					KTApp.unblockPage();
			});

            $('.general-form').ajaxForm({
                beforeSubmit:  function(formData, jqForm, options){
                    var val = null;
                    $(".formprogress").show();
                    $(".my-loader").addClass('active');
                    $( ".required", jqForm ).each(function( index ) {
                        if(!$(this).val()){
                            val = 1;
                            $(this).addClass('is-invalid').addClass('is-invalid').closest('.form-group').find('.invalid-feedback').show().html('');
                            $(this).closest('.form-group').find('.invalid-feedback').html("Bu alan zorunludur.");
                            $(this).closest('.form-group').addClass('invalid-select');
                        }else{
                            $(this).removeClass('is-invalid');
                            $(this).closest('.form-group').removeClass('invalid-select');
                            $(this).closest('.form-group').find('.invalid-feedback').html(".");
                        }
                    });
                    if(val){
                        KTUtil.scrollTop();
                    }
                },
                error: function(){
                    $(".formprogress").hide();
                    $(".my-loader").removeClass('active');
                    swal.fire({
                        text: "Dikkat! Sistemsel bir hata nedeniyle kaydedilemedi!",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamam",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                },
                dataType:  'json',
                success:   function(item){
                    $(".my-loader").removeClass('active');
                    $(".formprogress").hide();
                    if(item.status){
                        swal.fire({
                            html: item.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Tamam",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            if(item.redirect){
                                window.location.href = item.redirect;
                            }else if(item.modal){
                                $('.modal').modal('hide');
                            }else if(item.modal){

                            }else{
                                location.reload();
                            }
                        });
                    }else{
                        $('.is-invalid').removeClass('is-invalid').closest('.form-group').find('.invalid-feedback').hide();
                        $('.is-invalid').removeClass('is-invalid').closest('.form-group').removeClass('.invalid-select');
                        $.each(item.errors, function(key, value) {
                            $("[name="+key+"]").addClass('is-invalid').closest('.form-group').find('.invalid-feedback').show().html('');
                            $.each(value, function(k, v) {
                                $("[name="+key+"]").closest('.form-group').addClass('invalid-select').find('.invalid-feedback').append(v + "<br>");
                            });
                        });

                        swal.fire({
                            html: item.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Tamam",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                    }
                }
            });
        </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
