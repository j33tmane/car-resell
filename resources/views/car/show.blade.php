@extends('layouts.master')
@section('title')
    Car Details
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Forms
        @endslot
        @slot('title')
            Car Details
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Images</h4>
                    <p class="card-title-desc">Images uploaded by dealer</p>
                    @if ($car->images->count() == 0)
                        <div class="alert alert-danger">
                            <strong>Opps!</strong> Please upload at least one image</a>.
                        </div>
                    @endif
                    <div class="row">

                        @foreach ($car->images as $item)
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="{{ $item->imageUrl }}" class="card-img-top" alt="Cinque Terre" width="140px">
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="visible-print text-center">
                            {!! QrCode::size(100)->generate(url('dealer/car/' . $car->id)) !!}
                            <p>Scan me to return to the original page.</p>
                        </div> --}}
                    </div>



                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Car Information</h4>
                    <p class="card-title-desc">Information filled by dealer.</p>


                    <table class="table table-bordered">

                        <tbody>
                            @if ($car->car_number && $car->visibility != '2')
                                <tr>
                                    <th width="30%">Vehicle Number</th>
                                    <td>{{ $car->car_number ?? '' }}</td>
                                </tr>
                            @endif
                            @if ($car->car_brand)
                                <tr>
                                    <th>Brand</th>
                                    <td>{{ $car->car_brand ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->year)
                                <tr>
                                    <th>Year</th>
                                    <td>{{ $car->year ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->fuel)
                                <tr>
                                    <th>Fuel</th>
                                    <td>{{ $car->fuel ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->transmission)
                                <tr>
                                    <th>Transmission</th>
                                    <td>{{ config('drops.transmission')[$car->transmission ?? 1] }}</td>
                                </tr>
                            @endif
                            @if ($car->km_driven)
                                <tr>
                                    <th>KM Driven</th>
                                    <td>{{ $car->km_driven ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->no_of_owners)
                                <tr>
                                    <th>No Of Owners</th>
                                    <td>{{ $car->no_of_owners ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->tyre_type)
                                <tr>
                                    <th>Tyre Condtion</th>
                                    <td>{{ $car->tyre_type ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->insurance)
                                <tr>
                                    <th>Insurance</th>
                                    <td>{{ $car->insurance == 1 ? 'YES' : 'NO' }}</td>
                                </tr>
                            @endif
                            @if ($car->location)
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $car->location ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->bodystyle)
                                <tr>
                                    <th>Body-style</th>
                                    <td>{{ $car->body_style_name ?? 'NA' }}</td>
                                </tr>
                            @endif

                            @if ($car->engine)
                                <tr>
                                    <th>Engine(CC)</th>
                                    <td>{{ $car->engine ?? 'NA' }}</td>
                                </tr>
                            @endif
                            @if ($car->power)
                                <tr>
                                    <th>Power(bhp)</th>
                                    <td>{{ $car->power ?? 'NA' }}</td>
                                </tr>
                            @endif

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

                        </tbody>
                    </table>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
@endsection
