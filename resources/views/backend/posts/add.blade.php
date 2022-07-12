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
          <form action="{{ route('post-save') }}" class="general-form" method="POST">
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
                <label class="col-xl-3 col-lg-3 col-form-label">İçerik</label>
                <div class="col-lg-9 col-xl-6" >
                    <textarea name="content" id="content">
                        {!! $detail->content ?? null !!}
                    </textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Kategori</label>
                <div class="col-lg-9 col-xl-6">
                    <select class="form-control select2" id="kt_select2_3" name="categories[]" multiple="multiple" style="width: 100%;">
                        @foreach($categories as $c)
                            <option value="{{$c->id}}" @if(isset($detail) && in_array($c->id, $selected_categories)) selected @endif>{{$c->title}}</option>
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

        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>

@endsection
