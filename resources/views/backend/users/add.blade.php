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
          <form action="{{ route('user-save') }}" class="general-form" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $detail->id ?? null }}">
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Ad</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{ $detail->name ?? '' }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                <div class="col-lg-9 col-xl-6">
                  <input class="form-control form-control-lg form-control-solid" type="text" name="email" value="{{ $detail->email ?? '' }}">
                </div>
              </div>
              <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Şifre</label>
                  <div class="col-lg-9 col-xl-6">
                      <input class="form-control form-control-lg form-control-solid" type="password" name="password" value="{{ $detail->password ?? '' }}">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Kullanıcı Türü</label>
                  <div class="col-lg-9 col-xl-6">
                      <select name="user_group" class="custom-select form-control">
                          @foreach($user_groups as $u)
                              <option value="{{$u->id}}" @if(isset($detail) && $u->id == $detail->group_id) selected @endif >{{$u->title}}</option>
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
    <script src="{{asset('js/pages/crud/forms/editors/ckeditor-classic.js')}}" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $('#kt_select2_3').select2({
                placeholder: "Kategori Seçin",
            });
        })
    </script>

@endsection
