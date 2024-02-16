@extends('layouts.master')
@section('title')
    @lang('translation.Dashboard')
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            ABHCars
        @endslot
        @slot('title')
            Dashboard
        @endslot
    @endcomponent

    <div class="row">
        @if (!Auth::user()->dealerProfile)
            <div class="col-md-6 col-xl-3">
                <div class="alert alert-danger  fade show  px-4 mb-0 text-center" role="alert">
                    <i class="uil uil-exclamation-octagon d-block display-4 text-danger"></i>
                    <h5 class="text-danger">Oops</h5>
                    <p><a href="{{ url('/dealer-profile') }}">Please click to complete dealer profile first!</a></p>
                </div>
            </div>
        @endif
        @role('admin')
            <div class="col-md-6 col-xl-3">
                <div class="card bg-success-subtle">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <i class="uil-user-check text-primary" style="font-size: 30px"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $dpCnt }}</span></h4>
                            <p class="text-muted mb-0"><small>Dealers with complete profile</small></p>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->
        @endrole

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <i class="uil-car-sideview text-warning" style="font-size: 30px"></i>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $carsCnt }}</span></h4>
                        <p class="text-muted mb-0">Total Cars</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <i class="uil-comment-message text-success" style="font-size: 30px"></i>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $enqCnt }}</span></h4>
                        <p class="text-muted mb-0">Total Enquiry</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->

    </div> <!-- end row-->


    <div class="row">
        <div class="col-md-6">
            <div class="row">
                {{-- <div class="col-sm-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Website Link</h5>


                        <div class="card-body demo-vertical-spacing demo-only-element">




                            <div class="visible-print text-center mt-3" id="html-content-holder">
                                {!! QrCode::size(200)->generate(url('/dealer/' . Auth::user()->id)) !!}
                                <p>Scan me to return to visit dealer website.</p>
                            </div>
                            
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between flex-column flex-sm-row  "
                                    style="border-color: #696cff">
                                    <div class="offer">
                                        <p class="mb-0">{{ url('/dealer/' . Auth::user()->id) }}</p>
                                    </div>

                                    <button type="button" class="btn btn-outline-primary" data-bs-container="body"
                                        data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied!"
                                        onclick="copyText()">
                                        Copy
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-sm-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Search Car Link</h5>


                        <div class="card-body demo-vertical-spacing demo-only-element">



                            <div class="visible-print text-center mt-3" id="html-content-holder">
                                {!! QrCode::size(200)->generate(url('/search/' . Auth::user()->id . '/car')) !!}
                                <p>Scan me to return search car by vehicle number.</p>
                            </div>
                            {{-- <a id="btn-Convert-Html2Image" href="#">Download</a> --}}


                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between flex-column flex-sm-row  "
                                    style="border-color: #696cff">
                                    <div class="offer">
                                        <p class="mb-0">{{ url('/search/' . Auth::user()->id . '/car') }}</p>
                                    </div>

                                    <button type="button" class="btn btn-outline-primary" data-bs-container="body"
                                        data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Copied!"
                                        onclick="copyText('{{ url('/search/' . Auth::user()->id . '/car') }}')">
                                        Copy
                                    </button>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script>
        function copyText(str) {
            navigator.clipboard.writeText(str);
        }
    </script>

    <script>
        $(document).ready(function() {
            var element = $("#html-content-holder"); // global variable
            var getCanvas; // global variable

            html2canvas(element, {
                onrendered: function(canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });

            $("#btn-Convert-Html2Image").on('click', function() {
                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
            });
        });
    </script>
@endsection
