@extends('layouts.master')
@section('title')
    Dealers
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Dashboard
        @endslot
        @slot('title')
            Dealers
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Of Dealers </h4>
                    <p class="card-title-desc">
                        attached with us
                    </p>

                    <div class="table-responsive ">
                        <table class="table  table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>User Name</th>
                                    <th>Company</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dealers as $key => $del)
                                    <tr>
                                        <th scope="row">{{ ((request()->input('page') ?? 1) - 1) * 10 + ($key + 1) }}</th>
                                        <td>{{ $del->email ?? 'NA' }}</td>
                                        <td>{{ $del->name ?? 'NA' }}</td>
                                        <td><a
                                                href="{{ url('/dealer-profile/' . $del->id) }}">{{ $del->dealerProfile->company_name ?? 'NA' }}</a>
                                        </td>
                                        <td>{{ $del->dealerProfile->contact_call ?? 'NA' }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input"
                                                    id="customSwitch{{ $key }}"
                                                    onchange="changeMode(this,{{ $del->id }})"
                                                    {{ $del->getRawOriginal('active') == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="customSwitch{{ $key }}"><span
                                                        id="stat{{ $del->id }}">{{ $del->active ?? 'NA' }}</span></label>
                                            </div>
                                        </td>
                                        <td>

                                            <a href="{{ url('dealer/' . $del->id) }}" target="_blank">Dealer Page</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    {{ $dealers->links() }}
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
