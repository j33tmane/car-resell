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
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control" required placeholder="Calling Number"
                                    value="{{ $dp->contact_call ?? '' }}" name="contact_call" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">WhatsApp</label>
                                <input type="text" class="form-control" required placeholder="Contact Person Name"
                                    value="{{ $dp->contact_whatsapp ?? '' }}" name="contact_whatsapp" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control" name="imageFile" />
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
