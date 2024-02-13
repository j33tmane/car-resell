@extends('layouts.master')
@section('title')
    @lang('translation.Dashboard')
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            ABHCars
        @endslot
        @slot('title')
            Dealer Profile
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            @if ($dp)
                                <img class="rounded" src="{{ $dp->imageUrl }}" width="50px">
                            @endif
                        </div>
                        <div class="col">
                            <h4 class="card-title">General Information</h4>
                            <p class="card-title-desc">This information will be visble to users on your profile.
                            </p>
                        </div>
                    </div>

                    <form class="custom-validation"
                        action="{{ route('dealer-profile.update', $dp->user_id ?? Auth::user()->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Company name</label>
                                <div>
                                    <input type="text" class="form-control" required placeholder="Enter name"
                                        value="{{ $dp->company_name ?? '' }}" name="company_name" />
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" required placeholder="Type something"
                                    value="{{ $dp->address ?? '' }}" name="address" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Contact Person Name</label>
                                <input type="text" class="form-control" required placeholder="Contact Person Name"
                                    value="{{ $dp->contact_person_name ?? '' }}" name="contact_person_name" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Mobile<small> (+9188302xxxxx)</small></label>
                                <input type="text" class="form-control" required placeholder="Ex. +9188302XXXXX"
                                    value="{{ $dp->contact_call ?? '+91' }}" name="contact_call"
                                    data-parsley-pattern="^([+][9][1]){1}([7-9]{1})([0-9]{9})$" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">WhatsApp <small> (+9188302xxxxx)</small></label>
                                <input type="text" class="form-control" required placeholder="Ex. +9188302XXXXX"
                                    value="{{ $dp->contact_whatsapp ?? '+91' }}" name="contact_whatsapp"
                                    data-parsley-pattern="^([+][9][1]){1}([7-9]{1})([0-9]{9})$" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control" name="imageFile" />
                            </div>
                            <hr />
                            <div class="col-sm-6 mb-3">

                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" placeholder="Facebook page url"
                                    value="{{ $dp->social->fburl ?? '' }}" name="sl[fburl]"
                                    data-parsley-pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)" />
                            </div>
                            {{-- <div class="col-sm-6 mb-3">
                                <label class="form-label">Youtube Channel</label>
                                <input type="text" class="form-control" placeholder="Youtube Channel Url"
                                    value="{{ $dp->social->yturl ?? '' }}" name="sl[yturl]"
                                    data-parsley-pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)" />
                            </div> --}}
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Instagram </label>
                                <input type="text" class="form-control" placeholder="Instagram Profile Url"
                                    value="{{ $dp->social->instaurl ?? '' }}" name="sl[instaurl]"
                                    data-parsley-pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">External Website </label>
                                <input type="text" class="form-control" placeholder="Website Url"
                                    value="{{ $dp->social->weburl ?? '' }}" name="sl[weburl]"
                                    data-parsley-pattern="https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Theme </label>
                                <select class="form-control" name="sl[theme]">
                                    <option value="light">Select</option>
                                    <option value="info">Blue</option>
                                    <option value="danger">Red</option>
                                    <option value="secondary">Grey</option>
                                    <option value="warning">Yello</option>
                                    <option value="success">green</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
