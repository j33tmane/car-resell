@extends('layouts.master')
@section('title')
    Enqueiry
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Dashboard
        @endslot
        @slot('title')
            Enqueiry
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col text-start">
                            <h4 class="card-title">List Of Enqueirs </h4>
                            <p class="card-title-desc">
                                attached with us
                            </p>
                        </div>
                    </div>

                    <div class="table-responsive ">
                        <table class="table  table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ad Title</th>
                                    <th>Dealer</th>
                                    <th>Car</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    {{-- <th>Visible</th> --}}
                                    <th>Created</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enqs as $key => $enq)
                                    <tr>
                                        <th scope="row">{{ ((request()->input('page') ?? 1) - 1) * 10 + ($key + 1) }}
                                        </th>
                                        <td>{{ $enq->name ?? 'NA' }}</td>
                                        <td>{{ $enq->mobile ?? 'NA' }}</td>
                                        <td><a href="{{ url('dealer/car/' . $enq->car_id) }}"
                                                target="_blank">{{ $enq->car->car_name ?? 'NA' }} <i
                                                    class="uil-external-link-alt"></i></a>
                                        </td>
                                        <td>{{ $enq->car->car_brand ?? 'NA' }}</td>
                                        <td>₹{{ number_format($car->price)  ?? 'NA' }}</td>
                                        {{-- <td id="stat{{ $enq->id }}">{{ $enq->active == 0 ? 'Admin' : 'Dealer' }}
                                        </td> --}}
                                        <td>{{ date('d-m-Y', strtotime($enq->created_at)) ?? 'NA' }}</td>
                                        {{-- <td>
                                            <a href="{{ url('/cars/' . $enq->id . '/edit') }}"
                                                class="btn btn-sm btn-outline-warning">view</a>
                                        </td> --}}
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    {{ $enqs->links() }}
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
