@if (config('layout', 'extras/user/dropdown/style') == 'light')
    {{-- Header --}}
    <div class="d-flex align-items-center p-8 rounded-top">
        {{-- Symbol --}}
        <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
            <img src="{{ asset('media/users/300_21.jpg') }}" alt=""/>
        </div>

        {{-- Text --}}
        <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">{{$authenticated->name}}</div>
        <span class="label label-light-success label-lg font-weight-bold label-inline">{{ $authenticated->group->name }}</span>
    </div>
    <div class="separator separator-solid"></div>
@else
    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between flex-wrap p-8 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
        <div class="d-flex align-items-center mr-2">
            {{-- Symbol --}}
            <div class="symbol bg-white-o-15 mr-3">
                <span class="symbol-label text-success font-weight-bold font-size-h4">S</span>
            </div>

            {{-- Text --}}
            <div class="text-white m-0 flex-grow-1 mr-3 font-size-h5">{{$authenticated->name}}</div>
        </div>
        <span class="label label-success label-lg font-weight-bold label-inline">{{ $authenticated->group->name }}</span>
    </div>
@endif

{{-- Nav --}}
<div class="navi navi-spacer-x-0 pt-5">
    {{-- Item --}}
    <a href="{{ route('user-profile') }}" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-calendar-3 text-success"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    Profil Bilgilerim
                </div>
                <div class="text-muted">
                    Parola ve genel bilgiler
                </div>
            </div>
        </div>
    </a>


    {{-- Footer --}}
    <div class="navi-separator mt-3"></div>
    <div class="navi-footer  px-8 py-5">
        <a href="{{ route('logout') }}" class="btn btn-light-primary font-weight-bold">G??venli ????k????</a>
        <!--<a href="#" target="_blank" class="btn btn-clean font-weight-bold">Upgrade Plan</a>-->
    </div>
</div>
