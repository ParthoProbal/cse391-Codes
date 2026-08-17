<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        {{ $user->name }}

    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-dark text-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-secondary">

        <div class="container">

            <a
                class="navbar-brand fw-bold"
                href="{{ route('home') }}">

                Auto<span class="text-primary">Market</span>

            </a>

            <a
                href="{{ route('car_listings.index') }}"
                class="btn btn-outline-light">

                Browse Cars

            </a>

        </div>

    </nav>

    <div class="container py-5">

        <div class="mb-5">

            <h1>

                {{ $user->name }}

            </h1>

            <p class="text-secondary">

                Seller Profile

            </p>

            <p>

                Total Listings:

                {{ $carListings->count() }}

            </p>

        </div>

        @if($carListings->count() > 0)

        <div class="row g-4">

            @foreach($carListings as $carListing)

            <div class="col-md-6 col-lg-4">

                <div class="card bg-black border-secondary h-100">

                    @if($carListing->image)

                    <img
                        src="{{ asset('storage/' . $carListing->image) }}"
                        class="card-img-top"
                        style="height:220px; object-fit:cover;">

                    @endif

                    <div class="card-body">

                        <h5>

                            {{ $carListing->title }}

                        </h5>

                        <p class="text-secondary">

                            {{ $carListing->brand->name }}

                            •

                            {{ $carListing->city->name }}

                        </p>

                        <h4 class="text-primary">

                            ${{ number_format($carListing->price) }}

                        </h4>

                    </div>

                    <div class="card-footer bg-black border-secondary">

                        <a
                            href="{{ route('car_listings.show', $carListing) }}"
                            class="btn btn-outline-primary w-100">

                            View Details

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        @else

        <div class="alert alert-secondary">

            This seller doesn't have any approved listings yet.

        </div>

        @endif

    </div>

</body>

</html>