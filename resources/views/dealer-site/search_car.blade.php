@extends('layouts.dealer-site')
@section('tags')
    {{-- <meta property="og:image" content="{{ $car->firstImageUrl }}"> --}}
@endsection
@section('content')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container p-4" style="{{ !$car ? 'margin-top: 10%;margin-bottom: 10%;' : '' }}">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h3>Enter Car Number</h3>
                    <p>Enter vehicle number to find vehicle details Ex. MH09FB1234</p>
                    <form action="{{ url('/search/' . $dealer->id . '/car') }}" method="get">
                        <div class="row">
                            <input type="text" name="filter[car_number]" class="form-control text-uppercase"
                                placeholder="Enter number here" pattern="^[A-Z,a-z]{2}[0-9]{2}[A-Z,a-z]{2}[0-9]{4}$"
                                title="10 Chars Long Ex. MH09FB1234 (No Space Allowed)" required>
                            <input type="submit" value="Search" class="btn btn-primary mt-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @if ($car)
        <section id="search" class="bg-white" style="padding-top: 0px; margin-bottom: 10%;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 ">
                        <div class="img img-thumbnail">
                            <img src="{{ $car->firstImageUrl }}" class="img-fluid" style="object-fit: cover;">
                        </div>
                        <div class="card p-3 mt-2 text-center bg-warning-subtle">
                            <h2> ₹ {{ $car->price }}</h2>
                        </div>
                        <table class="table table-striped mt-2">
                            <tbody>
                                <tr>
                                    <th>Vehical No</th>
                                    <td>{{ $car->car_number ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th width="40%">Brand</th>
                                    <td>{{ $car->car_brand ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <td>{{ $car->year ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>Fuel</th>
                                    <td>{{ $car->fuel ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>Transmission</th>
                                    <td>{{ config('drops.transmission')[$car->transmission ?? 1] }}</td>
                                </tr>
                                <tr>
                                    <th>KM Driven</th>
                                    <td>{{ $car->km_driven ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>No Of Owners</th>
                                    <td>{{ $car->no_of_owners ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>Tyre Condtion</th>
                                    <td>{{ $car->tyre_type ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>Insurance</th>
                                    <td>{{ $car->insurance == 1 ? 'YES' : 'NO' }}</td>
                                </tr>
                                <tr>
                                    <th>Power Window</th>
                                    <td>{{ $car->p_window == 1 ? 'YES' : 'NO' }}</td>
                                </tr>
                                <tr>
                                    <th>Power Steering</th>
                                    <td>{{ $car->p_steering == 1 ? 'YES' : 'NO' }}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $car->location ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>Body-style</th>
                                    <td>{{ $car->bodystyle ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>Engine(CC)</th>
                                    <td>{{ $car->engine ?? 'NA' }}</td>
                                </tr>
                                <tr>
                                    <th>Power(bhp)</th>
                                    <td>{{ $car->power ?? 'NA' }}</td>
                                </tr>

                                <tr>
                                    <th>Features</th>
                                    <td>
                                        @if ($car->features != null)
                                            @foreach (explode(',', $car->features) as $item)
                                                {{ Config::get('drops.features')[$item] }},
                                            @endforeach
                                        @else
                                            no features available
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $car->car_description ?? 'NA' }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="alert alert-danger text-center">
                        <strong>Opps! No Vehile found !</strong><br> Vehicle number that you entered is incorrect,
                        please check and enter again.</a>.
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
@endsection
