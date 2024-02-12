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



                                            @if ($car->is_sold == 1)
                                                <a href=""><span class="badge bg-danger h6 text-white "
                                                        style="padding: 4% 8% 4% 8%;  "><b> SOLD </b></span></a>
                                            @else
                                                <a href="{{ url('/cars-sold/create?carid=' . $car->id) }}">
                                                    <i class="bx bx-select-multiple text-secondary">
                                                    </i><small class="text-secondary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="sold">Sold</small></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                                <a href="{{ url('/dealer/car/' . $car->id) }}" target="_blank"><i
                                                        class="bx bx-world text-secondary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="details"></i></a>
                                            @endif




                                        </td>



                                        <td>
                                            <div class="button-container" style="display:flex; gap:5px">

                                                <a href="{{ url('/cars/' . $car->id . '/edit') }}"
                                                    class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip"
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
