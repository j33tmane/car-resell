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

                        <div class="visible-print text-center">
                            {!! QrCode::size(100)->generate(url('dealer/car/'.$car->id)) !!}
                            <p>Scan me to return to the original page.</p>
                        </div>
                    </div>


                    
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Car Information</h4>
                    <p class="card-title-desc">Information filled by dealer.</p>


                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <th width="30%">Brand</th>
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

                        </tbody>
                    </table>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
@endsection
