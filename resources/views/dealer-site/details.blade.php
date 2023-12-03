@extends('layouts.dealer-site')
@section('tags')
    <meta property="og:image" content="{{ $car->firstImageUrl }}">
@endsection
@section('content')
    <section class="py-5 container">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
        <div class="row mt-2">
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    {{-- <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div> --}}
                    <div class="carousel-inner">


                        @foreach ($car->images as $key => $item)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ $item->imageUrl }}" class="w-100 rounded" alt="..."
                                    style="max-height:500px;object-fit: cover;">
                            </div>
                        @endforeach

                        @if ($car->images->count() == 0)
                            <div class="carousel-item active">
                                <img src="{{ $car->firstImageUrl }}" class="w-100 rounded" alt="..."
                                    style="max-height:500px;object-fit: cover;">
                            </div>
                        @endif


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <article class="blog-post">
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col">
                            <h2 class="blog-post-title">{{ $car->car_name }}
                            </h2>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-sm text-success"
                                href="whatsapp://send?text=I just saw this ad {{ $car->car_name }} on {{ $car->dealerProfile->company_name }} website.%0a{{ Request::url() }}"
                                data-action="share/whatsapp/share" style="font-size:18px"> <i class="fa fa-whatsapp"
                                    style="font-size:20px"></i>
                            </a>
                            <a class="btn btn-sm text-primary"
                                href="https://telegram.me/share/url?url={{ Request::url() }}&text=I just saw this ad {{ $car->car_name }} on {{ $car->dealerProfile->company_name }} website."
                                data-action="share/whatsapp/share" style="font-size:18px"> <i class="fa fa-telegram"
                                    style="font-size:20px"></i>
                            </a>
                        </div>
                    </div>

                    <p class="blog-post-meta">{{ date('d-M-Y', strtotime($car->created_at)) ?? 'NA' }} by <a
                            href="{{ url('dealer/' . $car->dealerProfile->user_id) }}">{{ $car->dealerProfile->company_name }}</a>
                    </p>
                </article>
                <hr>



                <article class="blog-post">
                    <h5 class="blog-post-title">Features</h5>

                    <table class="table table-bordered">

                        <tbody>
                            <tr>
                                <th>Brand</th>
                                <td>{{ $car->car_brand ?? 'NA' }}</td>
                            </tr>
                            <tr>
                                <th>Year</th>
                                <td>{{ $car->year ?? 'NA' }}</td>
                            </tr>
                            <tr>
                                <th>Fuel</th>
                                <td>{{ $car->fuel ?? 'NA' }}</td>
                            </tr>
                            <tr>
                                <th>Transmission</th>
                                <td>{{ config('drops.transmission')[$car->transmission ?? 1] }}</td>
                            </tr>
                            <tr>
                                <th>KM Driven</th>
                                <td>{{ $car->km_driven ?? 'NA' }}</td>
                            </tr>
                            <tr>
                                <th>No Of Owners</th>
                                <td>{{ $car->no_of_owners ?? 'NA' }}</td>
                            </tr>
                            <tr>
                                <th>Tyre Condtion</th>
                                <td>{{ $car->tyre_type ?? 'NA' }}</td>
                            </tr>
                            <tr>
                                <th>Insurance</th>
                                <td>{{ $car->insurance == 1 ? 'YES' : 'NO' }}</td>
                            </tr>
                            <tr>
                                <th>Power Window</th>
                                <td>{{ $car->p_window == 1 ? 'YES' : 'NO' }}</td>
                            </tr>
                            <tr>
                                <th>Power Steering</th>
                                <td>{{ $car->p_steering == 1 ? 'YES' : 'NO' }}</td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>{{ $car->location ?? 'NA' }}</td>
                            </tr>

                        </tbody>
                    </table>

                </article>

                <article class="blog-post">

                    <h5 class="blog-post-title">Description</h5>
                    <p>{{ $car->car_description ?? 'No Description is provided by dealer.' }}</p>


                </article>



            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">

                    <div class="p-4 mb-3 bg-light rounded">
                        <h2 class="fw-bold">₹ {{ number_format($car->price) }}</h2>
                        <p class="mb-0">Customize this section to tell your visitors a little bit about your
                            publication, writers, content, or something else entirely. Totally up to you.</p>
                        <div class="d-grid gap-2 mt-4">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Submit Enquiry</button>
                        </div>
                    </div>
                    <div class="">
                        @if ($car->video_id)
                            <div class="carousel-item active">
                                <iframe width="100%"
                                    height="250px"src="https://www.youtube.com/embed/{{ $car->video_id }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                    </div>



                </div>
            </div>
        </div>
    </section>

    <br>
    {{-- <section class="py-5 container ">
        Related Ads
        <div class="row mb-2">
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html" data-clickable="true"
                    data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text text-sm-start">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text ">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text ">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-2">
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html" data-clickable="true"
                    data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text text-sm-start">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text ">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 oc-card">
                <div class="card shadow-sm" data-clickable="true" data-href="details.html">
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Y8bRw-GhxxxyuX8vUAZCXRNaFIDCINirXspJHyo0Dh1f8K5MzPOUAfOOf9gGq-JQmfE&usqp=CAU">
                    <div class="card-body" style="padding: 5px;">
                        <div class="row justify-content-between">
                            <div class="col">
                                <p class="card-text ">Alto 800 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}
    <!-- Varying Modal Content example -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ url('enquiry/car/' . $car->id) }}" class="custom-validation">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Submit Enquiry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="mb-1">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-1">
                            <label for="mobile" class="col-form-label">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                data-parsley-pattern="^[789]\d{9}$" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

    {{-- <script>
        let image = @json($car->firstImageUrl);
        let url = window.location.href;
        let title = @json($car->car_name);
        let desc = @json($car->dealerProfile->company_name);
        if ('canShare' in navigator) {
            const share = async function(shareimg, shareurl, sharetitle, sharetext) {
                try {
                    const response = await fetch(shareimg, {
                        headers: {
                            'Access-Control-Allow-Origin': '*',
                            "Access-Control-Allow-Methods": "GET,HEAD"
                        }
                    });
                    const blob = await response.blob();
                    const file = new File([blob], 'abhcars.jpg', {
                        type: blob.type
                    });
                    // "I just saw this ad " + title + ",Visit: " + desc + " For more deatils.\n" +
                    await navigator.share({
                        url: shareurl,
                        title: sharetitle,
                        text: sharetext,
                        files: [file]
                    });
                } catch (err) {
                    console.log(err.name, err.message);
                }
            };

            document.getElementById('share').addEventListener('click', () => {
                share(
                    image,
                    url,
                    title,
                    "Dealer: " + desc
                );
            });
        }
    </script> --}}
@endsection
