@extends('layouts.master')
@section('title')
    Sold Cars
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Dashboard
        @endslot
        @slot('title')
            Sold Cars
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
                            <h4 class="card-title">List Of Sold Cars </h4>
                            <p class="card-title-desc">
                                sold cars history by dealers
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
                                    <th>Brand</th>
                                    <th>Ask Price</th>
                                    <th>Sold Price</th>
                                    <th>Cust. Name</th>
                                    <th>Cust. Mobile</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sold_records as $key => $record)
                                    <tr>
                                        <th scope="row">{{ ((request()->input('page') ?? 1) - 1) * 10 + ($key + 1) }}
                                        </th>
                                        <td>{{ $record->car->car_name ?? 'NA' }}</td>
                                        <td>{{ $record->car->dealerProfile->company_name ?? 'NA' }}</td>
                                        <td>{{ $record->car->car_brand ?? 'NA' }}</td>
                                        <td>{{ $record->car->price ?? 'NA' }}</td>
                                        <td>{{ $record->sell_price ?? 'NA' }}</td>
                                        <td>{{ $record->customer_name ?? 'NA' }}</td>
                                        <td>{{ $record->customer_mobile ?? 'NA' }}</td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    {{ $sold_records->links() }}
                </div>
            </div>
        </div>
    </div>



    <!-- end row -->
@endsection

@section('script')
@endsection
