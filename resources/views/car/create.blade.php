@extends('layouts.master')
@section('title')
    Add New Car
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Forms
        @endslot
        @slot('title')
            Add New Car
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
        </div>


        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Car Information</h4>
                    <p class="card-title-desc">Please try to fill maximum information to attract more customers.</p>

                    <form action="{{ route('cars.store') }}" class="custom-validation" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3 mb-3">
                                <label class="form-label">Delaer</label>
                                <div>
                                    <select id="fuel" class="form-control mb-2" name="user_id" required>
                                        @role('admin')
                                            <option value=''>Select Dealer </option>
                                        @endrole
                                        @foreach ($dealers as $dealer)
                                            <option value='{{ $dealer->user_id }}'>{{ $dealer->company_name }} </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Brand</label>
                                    <div>
                                        <select id="brands" class="form-control mb-2" name="car_brand" required>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Ad Title / Car Name</label>
                                <div>
                                    <input type="text" class="form-control" required data-parsley-minlength="6"
                                        placeholder="Car Name  Min 6 chars." name="car_name" />
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label">Car Color</label>
                                <div>
                                    <input type="text" class="form-control" required data-parsley-minlength="3"
                                        placeholder="Enter car color  Ex. Red" name="color" />
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Year</label>
                                    <div>
                                        <select id="year" class="form-control mb-2" name="year" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Fuel</label>
                                    <div>
                                        <select id="fuel" class="form-control mb-2" name="fuel" required>
                                            <option value=''>Select Fuel </option>
                                            <option value='disel'>Disel </option>
                                            <option value='petrol'>Petrol </option>
                                            <option value='electric'>Electric </option>
                                            <option value='cng'>CNG </option>
                                            <option value='petrol-cng'>Petrol-CNG </option>
                                            <option value='disel-cng'>Disel-CNG </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Transmission</label>
                                    <div>
                                        <select id="fuel" class="form-control mb-2" name="transmission" required>
                                            <option value=''>Select Transmission </option>
                                            <option value='2'>Automatic </option>
                                            <option value='1'>Manual </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">KM Driven</label>
                                    <div>
                                        <input type="number" class="form-control" required placeholder="Kilo Meters Driven"
                                            name="km_driven" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">No Of Owners</label>
                                    <div>
                                        <input type="number" class="form-control" required placeholder="Number Of Owners"
                                            name="no_of_owners" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Vehical Number</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Vehical Number"
                                            name="car_number" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label text-primary">Price</label>
                                    <div>
                                        <input type="number" class="form-control" data-parsley-min="6" placeholder="Price"
                                            name="price" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Car Location</label>
                                    <div>
                                        <input type="text" class="form-control" placeholder="ex. Kolahpur"
                                            name="location" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="mb-3">
                                    <label class="form-label">Tyre Condition</label>
                                    <div>
                                        <select id="fuel" class="form-control mb-2" name="tyre_type">
                                            <option value=''>Select Condition </option>
                                            <option value='low'>Low </option>
                                            <option value='medium'>Medium </option>
                                            <option value='best'>Best </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="mb-3">
                                    <label class="form-label">Insurance</label>
                                    <div>
                                        <select id="fuel" class="form-control mb-2" name="insurance">
                                            <option value=''>Select </option>
                                            <option value='1'>Yes </option>
                                            <option value='2'>No </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="mb-3">
                                    <label class="form-label">Power Window</label>
                                    <div>
                                        <select id="fuel" class="form-control mb-2" name="p_window">
                                            <option value=''>Select </option>
                                            <option value='1'>Yes </option>
                                            <option value='2'>No </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="mb-3">
                                    <label class="form-label">Power Steering</label>
                                    <div>
                                        <select id="fuel" class="form-control mb-2" name="p_steering">
                                            <option value=''>Select </option>
                                            <option value='1'>Yes </option>
                                            <option value='2'>No </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <button type="button" class="btn-link btn btn-sm  waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">Sample
                                        Description</button>
                                    <div>
                                        <textarea class="form-control" name="car_description">
                                       </textarea>
                                    </div>
                                </div>
                            </div>

                        </div>


                        {{-- <div class="mb-3 row">
                            <div class="col-md">
                              <small class="text-light text-uppercase fw-medium d-block">Features</small>
                              <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="checkbox" name="abs" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">ABS</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="clock" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Central Locking</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="ac" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Air Conditioner</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pstrering" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Power Steering</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pwindow" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Power Windows</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="heat" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Auxiliary Heating</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="btooth" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Bluetooth</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="cd" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">CD player</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="seat" value="1">
                                <label class="form-check-label" for="inlineCheckbox2">Leather Seats</label>
                              </div>
                            </div> 
                          </div> --}}


                        <div>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    <!-- Scrollable modal example-->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Sample points for description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <p>KEY FEATURES</p>
                    <p>Leather Upholstery<br />Automatic Temperature Control<br />Wireless Phone Connectivity<br />Exterior
                        Parking Camera Right</p>
                    <p>Camera Rear<br />Dual Zone A/C Up Front<br />Speed-Sensitive Windshield Wipers<br />Power Moonroof
                    </p>
                    <p>DETAILED FEATURES</p>
                    <ul role="list">
                        <li>1-touch down/up windows</li>
                        <li>Power moonroof</li>
                        <li>Power windows</li>
                        <li>Air conditioning</li>
                        <li>Automatic temperature control</li>
                        <li>Front dual zone A/C</li>
                        <li>Remote keyless entry</li>
                        <li>Speed control</li>
                        <li>Auto-dimming rearview mirror</li>
                        <li>Driver vanity mirror</li>
                        <li>Front beverage holders</li>
                        <li>Driver door bin</li>
                        <li>Passenger door bin</li>
                        <li>Passenger vanity mirror</li>
                        <li>Overhead console</li>
                        <li>Illuminated entry</li>
                        <li>Rear beverage holders</li>
                        <li>Rear door bins</li>
                        <li>Telescoping steering wheel</li>
                        <li>Tilt steering wheel</li>
                    </ul>
                    <p>POWERTRAIN</p>
                    <ul role="list">
                        <li>I-4 cylinder configuration</li>
                        <li>Number of valves: 16</li>
                        <li>Front-wheel drive</li>
                        <li>Engine liters: 2.4</li>
                        <li>Engine location: front</li>
                        <li>Fuel economy city: 27mpg</li>
                        <li>Fuel economy highway: 34mpg</li>
                        <li>Fuel economy combined: 29mpg</li>
                        <li>Fuel tank capacity: 15.3 gallons</li>
                        <li>Horsepower: 185hp @ 6,400RPM</li>
                        <li>Torque: 181 lb.-ft. @ 3,900RPM</li>
                        <li>Continuously variable automatic transmission with mode select</li>
                        <li>Variable valve control</li>
                        <li>Recommended fuel: Regular Unleaded</li>
                    </ul>
                    <p>SUSPENSION</p>
                    <ul role="list">
                        <li>Alloy wheels</li>
                        <li>Four-wheel independent suspension</li>
                        <li>Front anti-roll bar</li>
                        <li>Rear anti-roll bar</li>
                        <li>Wheel size: 17&quot;</li>
                        <li>Low tire pressure warning</li>
                    </ul>
                    <p>OFF-ROAD</p>
                    <ul role="list">
                        <li>Approach angle: 28 degrees</li>
                        <li>Departure angle: 21 degrees</li>
                        <li>Ramp breakover angle: 16 degrees</li>
                        <li>Maximum ground clearance 6.4&quot;</li>
                    </ul>
                    <p>ENTERTAINMENT</p>
                    <ul role="list">
                        <li>1st row 7” LCD monitor</li>
                        <li>AM/FM radio with SiriusXM</li>
                        <li>CD player</li>
                        <li>MP3 decoder</li>
                        <li>Radio data system</li>
                        <li>7 Speakers</li>
                        <li>Steering wheel mounted audio controls</li>
                        <li>Bluetooth HandsFreeLink wireless phone connectivity</li>
                    </ul>
                    <p>INTERIOR/TRIM</p>
                    <ul role="list">
                        <li>Leather upholstery</li>
                        <li>Front center armrest</li>
                        <li>Power driver seat</li>
                        <li>Power 2-way driver lumbar support</li>
                        <li>Bucket front seats</li>
                        <li>Heated front seats</li>
                        <li>Leather shift knob</li>
                        <li>Split-folding rear seat with center armrest</li>
                    </ul>
                    <p>BODY EXTERIOR</p>
                    <ul role="list">
                        <li>Heated door mirrors</li>
                        <li>Power door mirrors</li>
                        <li>Rear cargo liftgate</li>
                        <li>Roof rack rails only</li>
                    </ul>
                    <p>DIMENSIONS</p>
                    <ul role="list">
                        <li>Compression ratio: 11.10 to 1</li>
                        <li>Curb weight: 3,457lbs</li>
                        <li>Engine bore x stroke: 3.43&quot; x 3.90&quot;</li>
                        <li>Engine displacement: 2.4 L</li>
                        <li>Engine horsepower: 185hp @ 6,400RPM</li>
                        <li>Engine torque: 181 lb.-ft. @ 3,900RPM</li>
                        <li>Exterior body width: 71.6&quot;</li>
                        <li>Exterior height: 64.7&quot;</li>
                        <li>Exterior length: 179.4&quot;</li>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script>
        //DEFAULT MSG FOR REJECTION
        let url = @json($brandurl);
        $.getJSON(url,
            function(json) {
                console.log(json)
                $("#brands").append("<option value=''>Select Brand </option>");
                $.each(json,
                    function(key, value) {
                        $("#brands").append("<option value='" + value.name + "'>" + value.name + "</option>");
                    });
            });

        $(document).ready(function() {
            console.log(new Date().getFullYear())
            $("#year").append("<option value=''>Select Year </option>");
            for (let i = 1990; i <= new Date().getFullYear(); i++) {
                $("#year").append("<option value='" + i + "'>" + i + "</option>");
            }

        });
    </script>
@endsection
