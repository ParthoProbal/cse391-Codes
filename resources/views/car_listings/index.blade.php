<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Browse Cars</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-dark">

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h1>Browse Cars</h1>

                <p class="text-secondary mb-0">
                    Browse available car listings.
                </p>

            </div>

            @auth

                <a
                    href="{{ route('car_listings.create') }}"
                    class="btn btn-primary"
                >
                    Sell Your Car
                </a>

            @endauth

        </div>


        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if($carListings->count() > 0)

            <div class="row g-4">

                @foreach($carListings as $carListing)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 bg-black border-secondary">

                            <div class="card-body">

                                <h5 class="card-title">
                                    {{ $carListing->title }}
                                </h5>

                                <p class="text-secondary mb-2">
                                    {{ $carListing->brand->name }}
                                    •
                                    {{ $carListing->city->name }}
                                </p>

                                <p class="mb-2">
                                    Year: {{ $carListing->year }}
                                </p>

                                <p class="mb-2">
                                    Mileage: {{ number_format($carListing->mileage) }} km
                                </p>

                                <h4 class="text-primary">
                                    ${{ number_format($carListing->price, 2) }}
                                </h4>

                                <a
                                    href="#"
                                    class="btn btn-outline-primary w-100 mt-3"
                                >
                                    View Details
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-5">

                <h4>
                    No cars available yet.
                </h4>

                <p class="text-secondary">
                    Approved car listings will appear here.
                </p>

            </div>

        @endif

    </div>

</body>

</html>