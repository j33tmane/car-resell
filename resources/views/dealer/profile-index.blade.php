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
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Contact Person Name</label>
                                <input type="text" class="form-control" required placeholder="Contact Person Name"
                                    value="{{ $dp->contact_person_name ?? '' }}" name="contact_person_name" />
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Mobile<small> (+9188302xxxxx)</small></label>
                                <input type="text" class="form-control" required placeholder="Ex. +9188302XXXXX"
                                    value="{{ $dp->contact_call ?? '+91' }}" name="contact_call"
                                    data-parsley-pattern="^([+][9][1]){1}([7-9]{1})([0-9]{9})$" />
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">WhatsApp <small> (+9188302xxxxx)</small></label>
                                <input type="text" class="form-control" required placeholder="Ex. +9188302XXXXX"
                                    value="{{ $dp->contact_whatsapp ?? '+91' }}" name="contact_whatsapp"
                                    data-parsley-pattern="^([+][9][1]){1}([7-9]{1})([0-9]{9})$" />
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Logo</label>
                                <input type="file" class="form-control" name="imageFile" />
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Profile Banner</label>
                                <input type="file" class="form-control" name="bannerFile" />
                            </div>
                            {{-- @role('admin') --}}
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Sold Cars Base Count</label>
                                <div>
                                    <input type="number" class="form-control" required placeholder="Enter sold count"
                                        value="{{ $dp->sold_cars ?? '' }}" name="sold_cars" />
                                </div>
                            </div>
                            {{-- @endrole --}}
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
                                <select class="form-control text-{{ $dp->social->theme ?? '' }}" name="sl[theme]">
                                    <option value="">Select</option>
                                    <option value="info" class="text-info"
                                        {{ ($dp->social->theme ?? '') == 'info' ? 'selected' : '' }}>⬤ Cyan</option>
                                    <option value="danger" class="text-danger"
                                        {{ ($dp->social->theme ?? '') == 'danger' ? 'selected' : '' }}>⬤ Red</option>
                                    <option value="secondary" class="text-secondary"
                                        {{ ($dp->social->theme ?? '') == 'secondary' ? 'selected' : '' }}>⬤ Grey</option>
                                    <option value="warning" class="text-warning"
                                        {{ ($dp->social->theme ?? '') == 'warning' ? 'selected' : '' }}>⬤ Yello</option>
                                    <option value="success" class="text-success"
                                        {{ ($dp->social->theme ?? '') == 'success' ? 'selected' : '' }}>⬤ Green</option>
                                    <option value="primary" class="text-primary"
                                        {{ ($dp->social->theme ?? '') == 'primary' ? 'selected' : '' }}>⬤ Blue</option>
                                </select>
                            </div>
                            <hr />
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Company Description</label>
                                <div>
                                    <textarea type="text" class="form-control" required placeholder="Enter description"
                                        value="{{ $dp->company_name ?? '' }}" rows="10" name="description">
                                    {{ $dp->description ?? 'Please see description template below..' }}
                                    </textarea>



                                </div>
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
            <div class="card">
                <div class=" p-3">
                    <h4>[Company Name]: Your Premier Destination for Quality Used Cars</h4>
                    <p>At [Company Name], we take pride in offering a curated selection of top-notch
                        used cars to meet your diverse needs and preferences. With a focus on
                        reliability, affordability, and customer satisfaction, we are your trusted
                        partner in finding the perfect pre-owned vehicle.</p>

                    <h5>1. Extensive Inventory</h5>
                    <p>Our showroom boasts a wide variety of makes and models, ensuring that you'll find
                        the ideal car to fit your lifestyle and budget. From compact cars for urban
                        commuting to spacious SUVs for family adventures, we have something for
                        everyone.</p>

                    <h5>2. Rigorous Inspection Process</h5>
                    <p>Every vehicle in our inventory undergoes a comprehensive inspection by our team
                        of expert technicians. We meticulously assess each car's mechanical performance,
                        safety features, and overall condition to guarantee its quality and reliability.
                    </p>

                    <h5>3. Transparent History Reports</h5>
                    <p>We believe in full transparency when it comes to the history of our vehicles.
                        That's why we provide detailed vehicle history reports, so you can make an
                        informed decision with confidence.</p>

                    <h5>4. Personalized Service</h5>
                    <p>Our friendly and knowledgeable sales team is dedicated to providing you with a
                        personalized shopping experience. Whether you have questions about a specific
                        model or need assistance finding the right financing options, we're here to help
                        every step of the way.</p>

                    <h5>5. Customer Satisfaction Guarantee</h5>
                    <p>Your satisfaction is our top priority. We strive to exceed your expectations by
                        offering exceptional service and support throughout your car-buying journey.</p>

                    <p>Visit [Company Name] today and discover why we're the preferred choice for
                        quality used cars. Let us help you find your dream car at a price you'll love.
                    </p>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
