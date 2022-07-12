{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<style>
tr, td{
  vertical-align:middle !important;
}

    body.waiting * {
        cursor: wait !important;
    }
</style>

<div class="alert alert-custom alert-white alert-shadow fade show gutter-b flex-row-fluid ml-lg-8" role="alert">
    <div class="btn btn-icon btn-clean btn-lg mr-1 pulse pulse-primary"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Media/Volume-full.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <path d="M16.3155516,16.1481997 C15.9540268,16.3503696 15.4970619,16.2211868 15.294892,15.859662 C15.0927222,15.4981371 15.2219049,15.0411723 15.5834298,14.8390024 C16.6045379,14.2679841 17.25,13.1909329 17.25,12 C17.25,10.8178416 16.614096,9.74756859 15.6048775,9.17309861 C15.2448979,8.96819005 15.1191879,8.51025767 15.3240965,8.15027801 C15.529005,7.79029835 15.9869374,7.66458838 16.3469171,7.86949694 C17.8200934,8.70806221 18.75,10.2731632 18.75,12 C18.75,13.7396897 17.8061594,15.3146305 16.3155516,16.1481997 Z M16.788778,19.8892305 C16.4155074,20.068791 15.9673493,19.9117581 15.7877887,19.5384876 C15.6082282,19.165217 15.7652611,18.7170589 16.1385317,18.5374983 C18.6312327,17.3383928 20.25,14.815239 20.25,12 C20.25,9.21171818 18.6622363,6.70862302 16.2061077,5.49544344 C15.8347279,5.31200421 15.682372,4.86223455 15.8658113,4.49085479 C16.0492505,4.11947504 16.4990201,3.96711914 16.8703999,4.15055837 C19.8335314,5.61416684 21.75,8.63546229 21.75,12 C21.75,15.3971108 19.7961591,18.4425397 16.788778,19.8892305 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
            <path d="M7,16 L3.60776773,15.3215535 C2.67291934,15.1345839 2,14.3137542 2,13.3603922 L2,10.6396078 C2,9.68624577 2.67291934,8.86541613 3.60776773,8.67844645 L7,8 L10.2928932,4.70710678 C10.6834175,4.31658249 11.3165825,4.31658249 11.7071068,4.70710678 C11.8946432,4.89464316 12,5.14899707 12,5.41421356 L12,18.5857864 C12,19.1380712 11.5522847,19.5857864 11,19.5857864 C10.7347835,19.5857864 10.4804296,19.4804296 10.2928932,19.2928932 L7,16 Z" fill="#000000"/>
        </g>
    </svg><!--end::Svg Icon--></span><span class="pulse-ring"></span></div>
    <div class="alert-text ml-3">Vermiş olduğunuz hizmetleri bu sayfa üzerinden görebilir, düzenleyebilir ve hizmeti satışa açıp kapatabilirsiniz. Yeni bir hizmet eklemek için sağ üstte bulunan Yeni Hizmet Ekle butonunu kullanabilirsiniz.</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
<div class="d-flex flex-row">
  <!--begin::Aside-->
  {{--<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
    <!--begin::Profile Card-->
    <div class="card card-custom card-stretch">
      <!--begin::Body-->
      <div class="card-body pt-4">
          @include('firm.components.left')
      </div>
      <!--end::Body-->
    </div>
    <!--end::Profile Card-->
  </div>--}}
  <!--end::Aside-->
  <!--begin::Content-->
  <div class="flex-row-fluid ml-lg-8">
    <div class="card card-custom card-stretch">
      <!--begin::Header-->
      <div class="card-header py-3">
        <div class="card-title align-items-start flex-column">
          <h3 class="card-label font-weight-bolder text-dark">{{ $page_title }}</h3>
        </div>
        <div class="card-toolbar">
          <a href="{{route('category-add')}}" class="btn btn-success">Yeni Kategori Ekle</a>
        </div>
      </div>
      <!--end::Header-->
      <!--begin::Form-->
        <!--begin::Body-->
        <div class="card-body">
          <table class="table table-striped- table-hover table-checkable" id="posts">
                <thead>
                    <tr>
                        <th scope="col">Kategori Adı</th>
                        <th scope="col">Kategori Açıklaması</th>
                        <th scope="col">Üst Kategori</th>
                        <th scope="col" class="text-right">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!--end::Body-->
      <!--end::Form-->
    </div>
  </div>
  <!--end::Content-->
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    {{--Servisler Datatable başlangıç--}}
    <script>
        var posttable = $('#posts').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "ajax": "{{ route('category-json')}}",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
        <'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            pageLength: 50,
            lengthMenu: [[50, 100, 500, 1000], [50, 100, 500, 1000]],
            "language": {
                "url":"https://cdn.datatables.net/plug-ins/1.10.20/i18n/Turkish.json"
            },
            "order": [[ 0, "desc" ]],
            "drawCallback": function( settings ) {
                $('[data-toggle="tooltip"]').tooltip()
            },
            columns: [
                { data: 'title', name: 'title', "render": function (data, type, row) {
                        return '<span class="text-dark-75 font-weight-bolder">'+data+'</span>'
                    }
                },
                { data: 'description', name: 'description', orderable: false, "render": function (data, type, row) {
                        return data;
                    }
                },
                { data: 'parent_id', name: 'parent_id', orderable: false, "render": function (data, type, row) {
                        if(row.parent){
                            return '<span class="label label-inline label-primary">'+ row.parent.title +'</span>';
                        }else{
                            return '<span class="label label-inline label-warning">Ana Kategori</span>';
                        }
                    }
                },
                { data: 'id', className:"align-right", name: 'id', orderable: false, "render": function(data, type, row) {
                        var editme = '<a href="{{ route("category-update") }}/'+data+'" class="btn btn btn-icon btn-light btn-hover-primary btn-sm" data-toggle="tooltip" data-theme="light" title="Düzenle"><i class="flaticon2-writing icon-md text-primary"></i></a>&nbsp';

                        var result = "";
                        if(row.edit_allowed){
                            result += editme;
                        }

                        return  '<div style="white-space:nowrap">'+result+'</div>';
                    }
                },
            ],
        });

        $("body").on('click', '.delete-post', function(e){
            e.preventDefault();
            var thi = $(this);
            var href = $(this).attr('href');
            swal.fire({
                title: "Emin misiniz?",
                text: "Bu işlemin geri dönüşü bulunmamaktadır",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Evet, sil!",
                cancelButtonText: "Hayır, vazgeç!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: href,
                        dataType: 'json',
                        type: 'get',
                        success: function(data){
                            if(data.status){
                                posttable.ajax.reload();
                            }else{
                                swal.fire(
                                    "Dikkat",
                                    data.message,
                                    "error"
                                )
                            }
                        }
                    });
                } else if (result.dismiss === "cancel") {

                }
            });
        });
    </script>
    {{--Servisler Datatable bitiş--}}
    <script>
        $('#services')  .on('processing.dt',function( e, settings, processing ){
            if (processing){
                $('body').addClass('waiting');
            }else {
                $('body').removeClass('waiting');
            }
        } );
    </script>
@endsection
