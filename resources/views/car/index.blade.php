@extends('layouts.master')
@section('title')
    Cars
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Dashboard
        @endslot
        @slot('title')
            Cars
        @endslot
    @endcomponent


    {{-- <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
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
                        <div class="col text-end">
                            <a class="btn btn-outline-primary" href="{{ route('cars.create') }}">+ Add Car</a>
                        </div>
                    </div>

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
                                        <td>{{ $car->price ?? 'NA' }}</td>
                                        <td id="stat{{ $car->id }}">{{ $car->active == 0 ? 'Inactive' : 'Active' }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/cars/' . $car->id . '/edit') }}"
                                                class="btn btn-sm btn-outline-warning">Edit & Upload</a>
                                            <a href="{{ url('/cars/' . $car->id) }}"
                                                class="btn btn-sm btn-outline-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
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
                        <div class="col text-end">
                            <a class="btn btn-outline-primary" href="{{ route('cars.create') }}">+ Add Car</a>
                        </div>
                    </div>

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
                                        <td>{{ $car->price ?? 'NA' }}</td>
                                        <td id="stat{{ $car->id }}">{{ $car->active == 0 ? 'Inactive' : 'Active' }}
                                        </td>
                                        <td>
                                            <a href="{{url('/car/carSold_form')}}">
                                                <i class="bx bx-select-multiple text-secondary">
                                                </i><small class="text-secondary">Sold</small></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                                <a href="" target="_blank"><i class="bx bx-world text-secondary"></i></a></td>
                                        <td>
                                            <a href="{{ url('/cars/' . $car->id . '/edit') }}"
                                                class="btn btn-sm btn-outline-warning">Edit & Upload</a>
                                            <a href="{{ url('/cars/' . $car->id) }}"
                                                class="btn btn-sm btn-outline-info">View</a>

                                                <a href="{{ url('/cars/' . $car->id) }}"
                                                    class="btn btn-sm btn-outline-danger">Delete</a>

                                        
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>


   
    <!-- end row -->
@endsection

@section('script')
    <script>
        function changeMode(e, id) {
            console.log(e.id)
            $.ajax({
                type: 'GET',
                url: 'dealers/toggle/' + id,
                success: async function(data) {
                    if (data.status)
                        document.getElementById("stat" + id).innerHTML = data.state;
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }
    </script>
@endsection
