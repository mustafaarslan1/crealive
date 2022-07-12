{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="d-flex flex-row">
  <!--begin::Content-->
  <div class="flex-row-fluid ml-lg-8">
    <div class="card card-custom card-stretch">
      <!--begin::Header-->
      <div class="card-header py-3">
        <div class="card-title align-items-start flex-column">
          <h3 class="card-label font-weight-bolder text-dark">{{ $page_title }}</h3>
          <span class="text-muted font-weight-bold font-size-sm mt-1">{{ $page_description }}</span>
        </div>
        <div class="card-toolbar">

        </div>
      </div>
      <!--end::Header-->
      <!--begin::Form-->
        <!--begin::Body-->
        <div class="card-body">
          <form action="{{ route('category-save') }}" class="general-form" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $detail->id ?? null }}">
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Başlık</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="title" value="{{ $detail->title ?? '' }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Açıklama</label>
                <div class="col-lg-9 col-xl-6">
                  <input class="form-control form-control-lg form-control-solid" type="text" name="description" value="{{ $detail->description ?? '' }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Ana Kategori</label>
                  <label class="checkbox">
                      <input type="checkbox" name="is_parent" class="is-main-category" {{isset($detail) ? ($detail->is_parent ? "checked" : "") : "checked"}}/>
                      <span></span>
                  </label>
              </div>
              <div class="form-group row {{isset($detail) ? ($detail->is_parent ? "d-none" : "") : "d-none"}} category-div">
                  <label class="col-xl-3 col-lg-3 col-form-label">Ana Kategori Seç</label>
                  <div class="col-lg-9 col-xl-6">
                      <select name="main_category" class="custom-select form-control main-category">
                          @foreach($main_categories as $m)
                            <option value="{{$m->id}}" @if(isset($detail) && $m->id == $detail->parent_id) selected @endif >{{$m->title}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
            <div class="col-sm-3 offset-sk-9">
              <button class="btn btn-success" type="submit">Kaydet</button>
            </div>
          </form>
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

    <script>
        $(document).ready(function () {
            $('#kt_select2_3').select2({
                placeholder: "Kategori Seçin",
            });
        })

        $("body").on('change', '.is-main-category', function(){
            if($(this).is(':checked')){
                $('.category-div').addClass('d-none');
                return false;
            }else{
                $('.category-div').removeClass('d-none');
            }
        });

    </script>

@endsection
