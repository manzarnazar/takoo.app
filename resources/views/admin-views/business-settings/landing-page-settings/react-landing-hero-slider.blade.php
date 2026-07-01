@php use App\Models\DataSetting;use App\Models\ReactHeroSlider; @endphp
@extends('layouts.admin.app')

@section('title',translate('messages.react_landing_page'))

@section('content')
    @php($slide=null)
    <div class="content container-fluid">
        <div class="page-header pb-0">
            <div class="d-flex flex-wrap justify-content-between">
                <h1 class="page-header-title">
                <span class="page-header-icon">
                    <img src="{{asset('public/assets/admin/img/landing.png')}}" class="w--20" alt="">
                </span>
                    <span>
                    {{ translate('messages.react_landing_page') }}
                </span>
                </h1>
                <div class="text--primary-2 py-1 d-flex flex-wrap align-items-center" type="button" data-toggle="modal"
                     data-target="#how-it-works">
                    <strong class="mr-2">{{translate('See_how_it_works!')}}</strong>
                    <div>
                        <i class="tio-info-outined"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-20 mt-2">
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                @include('admin-views.business-settings.landing-page-settings.top-menu-links.react-landing-page-links')
            </div>
        </div>
        <div class="card py-3 px-xxl-4 px-3 mb-20">
            <div class="d-flex flex-sm-nowrap flex-wrap gap-3 align-items-center justify-content-between">
                <div class="">
                    <h3 class="mb-1">{{ translate('Hero Slider Section') }}</h3>
                    <p class="mb-0 gray-dark fs-12">
                        {{ translate('See how your Hero Slider Section will look to customers.') }}
                    </p>
                </div>
            </div>
        </div>
        @php($hero_slider_section_status = DataSetting::where('type', 'react_landing_page')->where('key', 'hero_slider_section_status')->first())
        <div class="card py-3 px-xxl-4 px-3 mb-15 mt-4">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-xxl-9 col-lg-8 col-md-7 col-sm-6">
                    <div class="">
                        <h3 class="mb-1">{{ translate('Show Hero Slider Section') }}</h3>
                        <p class="mb-0 gray-dark fs-12">
                            {{ translate('If you turn of the availability status, this section will not show in the website') }}
                        </p>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-md-5 col-sm-6">
                    <div class="py-2 px-3 rounded d-flex justify-content-between border align-items-center w-300">
                        <h5 class="text-capitalize fw-normal mb-0">{{ translate('Status') }}</h5>

                        <form
                            action="{{ route('admin.business-settings.statusUpdate', ['type' => 'react_landing_page', 'key' => 'hero_slider_section_status']) }}"
                            method="get" id="CheckboxStatus_form">
                        </form>
                        <label class="toggle-switch toggle-switch-sm" for="CheckboxStatus">
                            <input type="checkbox" data-id="CheckboxStatus" data-type="status"
                                   data-image-on="{{ asset('/public/assets/admin/img/status-ons.png') }}"
                                   data-image-off="{{ asset('/public/assets/admin/img/off-danger.png') }}"
                                   data-title-on="{{ translate('Do you want turn on this section ?') }}"
                                   data-title-off="{{ translate('Do you want to turn off this section ?') }}"
                                   data-text-on="<p>{{ translate('If you turn on this section will be show in react landing page.') }}"
                                   data-text-off="<p>{{ translate('If you turn off this section will not be show in react landing page.') }}</p>"
                                   class="toggle-switch-input  status dynamic-checkbox" id="CheckboxStatus"
                                {{ $hero_slider_section_status?->value ? 'checked' : '' }}>
                            <span class="toggle-switch-label text">
                                <span class="toggle-switch-indicator"></span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active">
                <div class="card mb-20">
                    <div class="card-header">
                        <div class="">
                            <h3 class="mb-1">{{ translate('Add Hero Slider Image') }}</h3>
                            <p class="mb-0 gray-dark fs-12">
                                {{ translate('Upload and manage full-width hero slider images for the landing page.') }}
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="custom-validation"
                              action="{{ route('admin.business-settings.hero-slider-store') }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card p-xxl-4 p-1">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="bg--secondary h-100 rounded p-md-4 p-3">
                                            <div class="text-center py-2">
                                                <div class="mb-4">
                                                    <h5 class="mb-1">{{ translate('Upload Hero Slider Image') }}</h5>
                                                    <p class="mb-0 fs-12 gray-dark">{{ translate('Upload your Hero Slider Image') }}</p>
                                                </div>
                                                <div class="mx-auto text-center error-wrapper">
                                                    <div class="upload-file_custom">
                                                        <input type="file" name="image"
                                                               class="upload-file__input single_file_input"
                                                               accept=".webp, .jpg, .jpeg, .png, .gif" required>
                                                        <label class="upload-file__wrapper ratio-5-4 m-0">
                                                            <div class="upload-file-textbox text-center">
                                                                <img width="22" class="svg"
                                                                     src="{{asset('public/assets/admin/img/document-upload.svg')}}"
                                                                     alt="img">
                                                                <h6 class="mt-1 color-656566 fw-medium fs-10 lh-base text-center">
                                                                    <span class="theme-clr">Click to upload</span>
                                                                    <br>
                                                                    Or drag and drop
                                                                </h6>
                                                            </div>
                                                            <img class="upload-file-img" loading="lazy" src=""
                                                                 data-default-src="" alt="" style="display: none;">
                                                        </label>
                                                        <div class="overlay">
                                                            <div
                                                                class="d-flex gap-1 justify-content-center align-items-center h-100">
                                                                <button type="button"
                                                                        class="btn btn-outline-info icon-btn view_btn">
                                                                    <i class="tio-invisible"></i>
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btn-outline-info icon-btn edit_btn">
                                                                    <i class="tio-edit"></i>
                                                                </button>
                                                                <button type="button" class="remove_btn btn icon-btn">
                                                                    <i class="tio-delete text-danger"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="fs-10 text-center mb-0 mt-lg-4 mt-3">
                                                    {{ translate('JPG, JPEG, PNG, Gif Image size : Max 2 MB')}} <span
                                                        class="font-medium text-title">{{ translate('(5:4)')}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn--container justify-content-end mt-20">
                                    <button type="reset" class="btn btn--reset mb-2">{{translate('Reset')}}</button>
                                    <button type="submit" class="btn btn--primary mb-2">{{translate('Add')}}</button>
                                </div>
                            </div>
                        </form>

                        <div class="card mt-20">
                            @php($slides = ReactHeroSlider::orderBy('id')->get())
                            <div class="card-header py-2 border-0">
                                <div
                                    class="d-flex w-100 flex-wrap gap-2 align-items-center justify-content-between">
                                    <h4 class="text-black m-0">{{ translate('Hero Slider List') }}</h4>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive datatable-custom">
                                    <table
                                        class="table table-borderless table-thead-borderless table-align-middle table-nowrap card-table m-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="border-top-0">{{translate('SL')}}</th>
                                            <th class="border-top-0">{{translate('banner Image')}}</th>
                                            <th class="border-top-0 text-center">{{translate('Status')}}</th>
                                            <th class="text-center border-top-0">{{translate('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($slides as $key=>$slide)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>
                                                    <img
                                                        src="{{ \App\CentralLogics\Helpers::get_full_url('hero_slider',$slide->image ?? '','public') }}"
                                                        data-onerror-image="{{asset('/public/assets/admin/img/upload-3.png')}}"
                                                        class="w-135px min-w-50px h-50px rounded mw-100 onerror-image"
                                                        alt="">
                                                </td>
                                                <td>
                                                    <label class="toggle-switch mx-auto toggle-switch-sm">
                                                        <input type="checkbox"
                                                               data-id="react_hero_slider_status_{{$slide->id}}"
                                                               data-type="status"
                                                               data-image-on="{{ asset('/public/assets/admin/img/modal/testimonial-on.png') }}"
                                                               data-image-off="{{ asset('/public/assets/admin/img/modal/testimonial-off.png') }}"
                                                               data-title-on="{{translate('Want_to_Enable_this')}} <strong>{{translate('Hero_Slider')}}</strong>"
                                                               data-title-off="{{translate('Want_to_Disable_this')}} <strong>{{translate('Hero_Slider')}}</strong>"
                                                               data-text-on="<p>{{translate('If_enabled,_it_will_be_available_on_the_React_Landing_page')}}</p>"
                                                               data-text-off="<p>{{translate('If_disabled,_it_will_be_hidden_from_the_React_Landing_page')}}</p>"
                                                               class="status toggle-switch-input dynamic-checkbox"
                                                               id="react_hero_slider_status_{{$slide->id}}" {{$slide->status?'checked':''}}>
                                                        <span class="toggle-switch-label mx-auto">
                                                            <span class="toggle-switch-indicator"></span>
                                                            </span>
                                                    </label>
                                                    <form
                                                        action="{{route('admin.business-settings.hero-slider-status',[$slide->id,$slide->status?0:1])}}"
                                                        method="get"
                                                        id="react_hero_slider_status_{{$slide->id}}_form">
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="btn--container justify-content-center">
                                                        <a class="btn action-btn btn-outline-theme-light editSlideBtn"
                                                           data-toggle="modal"
                                                           data-target="#updateSlide"
                                                           data-id="{{ $slide->id }}"
                                                           data-image="{{ $slide->image_full_url }}"
                                                           data-action="{{ route('admin.business-settings.hero-slider-update',[$slide->id]) }}"
                                                           href="#0">
                                                            <i class="tio-edit"></i>
                                                        </a>
                                                        <a class="btn action-btn btn--danger btn-outline-danger form-alert"
                                                           href="javascript:"
                                                           data-id="react_hero_slider-{{$slide['id']}}"
                                                           data-message="{{ translate('Want_to_Delete_this_Hero_Slider') }}"
                                                           data-message-2="{{ translate('If_yes,_the_slide_will_be_removed_from_this_list') }}"
                                                           title="{{translate('messages.delete_react_hero_slider')}}"><i
                                                                class="tio-delete-outlined"></i>
                                                        </a>
                                                    </div>
                                                    <form
                                                        action="{{route('admin.business-settings.hero-slider-delete',[$slide['id']])}}"
                                                        method="post"
                                                        id="react_hero_slider-{{$slide['id']}}">
                                                        @csrf @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if(count($slides) === 0)
                                <div class="empty--data">
                                    <img src="{{asset('/public/assets/admin/svg/illustrations/sorry.svg')}}"
                                         alt="public">
                                    <h5>
                                        {{translate('no_data_found')}}
                                    </h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateSlide" tabindex="-1" aria-labelledby="updateSlideLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header pt-2 px-2">
                        <button type="button" class="close fs-24" data-dismiss="modal" aria-label="Close">
                            <i class="tio-clear fs-24"></i>
                        </button>
                    </div>
                    <div class="modal-body p-xl-4 p-2">
                        <div class="card-body p-0">
                            <div class="mb-xxl-4 mb-xl-4 mb-3 text-center">
                                <h5 class="mb-0">{{ translate('Update Hero Slider Image') }}</h5>
                            </div>
                            <form class="custom-validation" method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="card-custom-static p-md-4 p-3">
                                    <div
                                        class="bg-light2 p-20 max-w-555px rounded mx-auto d-flex align-items-center justify-content-center">
                                        <div class="error-wrapper">
                                            <div class="upload-file_custom">
                                                <input type="file" name="image"
                                                       class="upload-file__input single_file_input"
                                                       accept=".webp, .jpg, .jpeg, .png, .gif">
                                                <label class="upload-file__wrapper ratio-5-4 m-0">
                                                    <div class="upload-file-textbox text-center">
                                                        <img width="22" class="svg"
                                                             src="{{asset('public/assets/admin/img/document-upload.svg')}}"
                                                             alt="img">
                                                        <h6 class="mt-1 color-656566 fw-medium fs-10 lh-base text-center">
                                                            <span class="theme-clr">Click to upload</span>
                                                            <br>
                                                            Or drag and drop
                                                        </h6>
                                                    </div>
                                                    <img class="upload-file-img" loading="lazy"
                                                         src=""
                                                         data-default-src="" alt=""
                                                         style="display: none;">
                                                </label>
                                                <div class="overlay">
                                                    <div
                                                        class="d-flex gap-1 justify-content-center align-items-center h-100">
                                                        <button type="button"
                                                                class="btn btn-outline-info icon-btn view_btn">
                                                            <i class="tio-invisible"></i>
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-outline-info icon-btn edit_btn">
                                                            <i class="tio-edit"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="fs-10 text-center mb-0 mt-lg-4 mt-3">
                                                {{ translate('JPG, JPEG, PNG, Gif Image Less Than 2MB')}} <span
                                                    class="font-medium text-title">{{ translate('(5:4)')}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="btn--container justify-content-end mt-4">
                                        <button type="reset" class="btn btn--reset">{{translate('Reset')}}</button>
                                        <button type="submit" class="btn btn--primary">{{translate('Update')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin-views.business-settings.landing-page-settings.partial.how-it-work-react')
        @endsection

        @push('script_2')
            <script>
                $(document).on('click', '.editSlideBtn', function () {
                    let imageUrl = $(this).data('image');
                    let action = $(this).data('action');

                    let $modal = $('#updateSlide');
                    let $img = $modal.find('.upload-file-img');

                    if (imageUrl) {
                        $img.attr('src', imageUrl).show();
                        $modal.find('.upload-file-textbox').hide();
                    } else {
                        $img.hide();
                        $modal.find('.upload-file-textbox').show();
                    }

                    $modal.find('form').attr('action', action);
                });
            </script>
    @endpush
