@extends('layouts.master')
@section('title')
    Search Cars
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Dashboard
        @endslot
        @slot('title')
            Search Cars
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/filter-cars') }}" method="GET">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Car Name <small>(Optional)</small></label>
                                    <input type="text" class="form-control" placeholder="Enter name of primary artist"
                                        name="filter[car_name]"
                                        value="{{ request()->input('filter')['car_name'] ?? null }}" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Brand</label>
                                    <div>
                                        <select id="brands" class="form-control mb-2" name="filter[car_brand]">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <label class="form-label">Fuel</label>
                                    <div>
                                        <select id="fuel" class="form-control mb-2" name="filter[fuel]">
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
                            <div class="col-md-6">
                                <div class="p-3">
                                    <h5 class="font-size-14 mb-3">Prefix</h5>
                                    <input type="text" id="range_03" name="filter[price_between]">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-start">
                            <h4 class="card-title">List Of Cars </h4>
                            <p class="card-title-desc">
                                attached with us
                            </p>
                        </div>
                    </div>
                    @isset($cars)
                        <div class="table-responsive ">
                            <table class="table  table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ad Title</th>
                                        <th>Dealer</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Status Change</th>
                                        <th>Actions</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cars as $key => $car)
                                        <tr>
                                            <th scope="row">{{ ((request()->input('page') ?? 1) - 1) * 10 + ($key + 1) }}
                                            </th>
                                            <td>{{ $car->car_name ?? 'NA' }}</td>
                                            <td>{{ $car->dealerProfile->company_name ?? 'NA' }}</td>
                                            <td>{{ $car->car_brand ?? 'NA' }}</td>
                                            <td>₹{{ number_format($car->price)  ?? 'NA' }}</td>
                                            <td id="stat{{ $car->id }}">{{ $car->active == 0 ? 'Inactive' : 'Active' }}
                                            </td>
                                            <td>
                                                <a href="{{ url('/cars-sold/create?carid=' . $car->id) }}">
                                                    <i class="bx bx-select-multiple text-secondary">
                                                    </i><small
                                                        class="text-secondary">Sold</small></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                                <a href="{{ url('/dealer/car/' . $car->id) }}" target="_blank"><i
                                                        class="bx bx-world text-secondary"></i></a>
                                            </td>



                                            <td>
                                                <div class="button-container" style="display:flex; gap:5px">

                                                    <a href="{{ url('/cars/' . $car->id . '/edit') }}"
                                                        class="btn btn-sm btn-outline-warning"data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit & Upload">Edit & Upload</a>

                                                    <a href="{{ url('/cars/' . $car->id) }}"
                                                        class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="View"><i class="fa fa-eye"></i></a>

                                                    <form action="{{ url('/cars/' . $car->id) }}"method="POST">

                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            data-original-title="Delete" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete"> <i class="fa fa-trash"></i>

                                                        </button>
                                                    </form>



                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        {{ $cars->links() }}
                    @endisset
                </div>
            </div>
        </div>
    </div>



    <!-- end row -->
@endsection

@section('script')
    <!-- Ion Range Slider-->
    <script src="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.js') }}"></script>
    <script>
        $("#range_03").ionRangeSlider({
            skin: "round",
            type: "double",
            grid: true,
            min: 0,
            max: 10000000,
            from: 100000,
            to: 300000,
            prefix: "₹"
        });
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
