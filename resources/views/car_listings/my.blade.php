<!DOCTYPE html>

<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>My Listings</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container py-5">

        <h1 class="mb-4">

            My Listings

        </h1>

        <div class="row g-4">

            @foreach($carListings as $carListing)

            <div class="col-md-6">

                <div class="card bg-black border-secondary">

                    <div class="card-body">

                        <h5>

                            {{ $carListing->title }}

                        </h5>

                        <p>

                            Status:

                            {{ ucfirst($carListing->status) }}

                        </p>

                        <div class="d-flex gap-2">

                            <a
                                href="{{ route('car_listings.edit', $carListing) }}"
                                class="btn btn-primary">

                                Edit

                            </a>

                            <form
                                action="{{ route('car_listings.destroy', $carListing) }}"
                                method="POST">

                                @csrf

                                @method('DELETE')

                                <button
                                    class="btn btn-danger">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</body>

</html>