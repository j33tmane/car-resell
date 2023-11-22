@extends('layouts.master')

@section('title')
    Role Master
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Dashboard
        @endslot
        @slot('title')
            Role
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            @include('flash::message')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role Name
                                        <span class="float-right">
                                            @if (request()->input('sort') == '-name')
                                                <a href="?sort=name"><i class="mdi mdi-sort-alphabetical-descending"></i></a>
                                            @else
                                                <a href="?sort=-name"><i
                                                        class="mdi mdi-sort-alphabetical-ascending"></i></a>
                                            @endif
                                            <span>
                                    </th>
                                    <th>User Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $item)
                                    <tr>
                                        <td scope="row">{{ ((request()->input('page') ?? 1) - 1) * 10 + ($key + 1) }}
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td><b>{{ $item->users_count }}</b></td>
                                        <td style="width: 15%">
                                            <div class="row">
                                                {{-- <div class="col">
                                                    <form method="post" action="{{ route('role.destroy', $item->id) }}"
                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm waves-effect waves-light mr-2 ml-2"
                                                            onclick="return confirm('Are you sure to delete?')"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </div> --}}
                                                <div class="col">
                                                    <a href="{{ route('assign-permission.edit', $item->name) }}"><i
                                                            class="fas fa-user-lock"></i></a>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- @component('layouts.components.norecordsintable')
                                @slot('collection') {{$categorys->count()}} @endslot
                                @slot('colspan') 6 @endslot
                            @endcomponent --}}
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $roles->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
