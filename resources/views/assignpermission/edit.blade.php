@extends('layouts.master')

@section('title')
    Manage Permission
@endsection

@section('content')
    <!-- start page title -->

    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Dashboard
        @endslot
        @slot('title')
            Assign Permission
        @endslot
    @endcomponent
    <div class="col-lg-12">
        @include('flash::message')

    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('assign-permission.update', $role->id) }}" method="POST" class="custom-validation"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" class="form-control" placeholder="Full name" name="role"
                        value="{{ $role->name }}" required autocomplete="name">
                    <div class="row">
                        <div class="col-sm-3">

                            <div class="form-group">
                                <label>Role {{ $role->name }}</label>
                                <?php $permissionsofrole = $role->permissions->pluck('name'); ?>
                                @if (count($permissionsofrole) == 0)
                                    <p> This Role Dont have any Permission.</p>
                                @else
                                    <p>
                                        @foreach ($permissionsofrole as $item)
                                            <i class="badge bg-soft-success"> {{ $item }}</i>
                                        @endforeach
                                @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Permission</label></br>
                                <input type="button" onclick='selects()' class="btn btn-sm btn-info mr-2"
                                    value="Select All" />
                                <input type="button" onclick='deSelect()' class="btn btn-sm btn-info mr-2"
                                    value="Deselect All" />
                                <!-- checkbox -->
                                {{-- <div class="form-group col-sm-6 col-lg-12"> --}}
                                <div class="form-check">
                                    <table>
                                        <?php $cnt = 0; ?>
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                <div class="col-sm-12 col-lg-4">

                                                    <input class="form-check-input" type="checkbox" id="permission"
                                                        name="permission[]" value="{{ $permission->name }}"
                                                        {{ in_array($permission->name, $permissionsofrole->toArray()) ? 'checked' : '' }}>
                                                    <label class="form-check-label">{{ $permission->name }}</label>

                                                </div>
                                                <?php $cnt++; ?>
                                            @endforeach
                                        </div>
                                    </table>

                                </div>
                                {{-- </div> --}}

                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Assign Permission</button>
                    {{ session('msg') }}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script>
        function selects() {
            var ele = document.getElementsByName('permission[]');
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = true;
            }
        }

        function deSelect() {
            var ele = document.getElementsByName('permission[]');
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = false;

            }
        }
    </script>
@endsection
