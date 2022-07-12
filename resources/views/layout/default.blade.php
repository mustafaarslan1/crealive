{{--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>

        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}

        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

        {{-- Includable CSS --}}
        @yield('styles')
    </head>

    <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

        @if (config('layout.page-loader.type') != '')
            @include('layout.partials._page-loader')
        @endif

        @include('layout.base._layout')


        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>

        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
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

        {{-- Includable JS --}}
        @yield('scripts')

    </body>
</html>

