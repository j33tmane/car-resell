@extends('layouts.admin')

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
    <div class="col-lg-6">
        @include('flash::message')
        @include('layouts.components.server_validation_error')
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4>Assign Permission </h4>
                <form action="{{ route('managepermissions.store') }}" method="POST" class="custom-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Roles</label>
                                <select class="form-control" name="role" id="role">
                                    @foreach ($roles as $role)
                                        <option>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Permission</label>/br>
                                <input type="button" onclick='selects()' class="btn btn-sm btn-info mr-2"
                                    value="Select All" />
                                <input type="button" onclick='deSelect()' class="btn btn-sm btn-info mr-2"
                                    value="Deselect All" />
                                <!-- checkbox -->
                                <div class="form-group col-sm-6 col-lg-12">
                                    <div class="form-check">
                                        <table>
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox" id="permission"
                                                            name="permission[]"
                                                            value="{{ $permission->name == 'yes' ? 'checked' : '' }}">
                                                        <label class="form-check-label">{{ $permission->name }}</label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Assign Permission</button>

                    </div>

                    {{ session('msg') }}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script>
        function selects() {
            var ele = document.getElementsByName('chk');
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = true;
            }
        }

        function deSelect() {
            var ele = document.getElementsByName('chk');
            for (var i = 0; i < ele.length; i++) {
                if (ele[i].type == 'checkbox')
                    ele[i].checked = false;

            }
        }
    </script>
@endsection
