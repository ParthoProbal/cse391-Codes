<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        {{ $carListing->title }}
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

            <div>

                <a
                    href="{{ route('car_listings.index') }}"
                    class="btn btn-outline-light">

                    Back to Listings

                </a>

            </div>

        </div>

    </nav>

    <div class="container py-5">

        <div class="card bg-black border-secondary text-light">

            <div class="card-body p-4">

                <h2 class="mb-4">

                    {{ $carListing->title }}

                </h2>

                <div class="row g-4">

                    <div class="col-md-6">

                        @if($carListing->image)
                        <img
                            src="{{ asset('storage/' . $carListing->image) }}"
                            class="img-fluid rounded"
                            style="width: 100%; max-height: 500px; object-fit: cover;"
                            alt="{{ $carListing->title }}">
                        @endif

                    </div>

                    <div class="col-md-6">

                        <h3 class="text-primary mb-4">

                            ${{ number_format($carListing->price) }}

                        </h3>

                        <p>

                            <strong>Brand:</strong>

                            {{ $carListing->brand->name }}

                        </p>

                        <p>

                            <strong>Model:</strong>

                            {{ $carListing->model }}

                        </p>

                        <p>

                            <strong>Year:</strong>

                            {{ $carListing->year }}

                        </p>

                        <p>

                            <strong>Mileage:</strong>

                            {{ number_format($carListing->mileage) }} km

                        </p>

                        <p>

                            <strong>Fuel Type:</strong>

                            {{ $carListing->fuel_type }}

                        </p>

                        <p>

                            <strong>Transmission:</strong>

                            {{ $carListing->transmission }}

                        </p>

                        <p>

                            <strong>City:</strong>

                            {{ $carListing->city->name }}

                        </p>

                        <p>

                            <strong>Seller:</strong>

                            <a
                                href="{{ route('seller.show', $carListing->user) }}"
                                class="text-decoration-none">

                                {{ $carListing->user->name }}

                            </a>

                        </p>

                        <p>

                            <strong>Email:</strong>
                            <span id="sellerEmail">
                                {{ $carListing->user->email }}
                            </span>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary ms-2"
                                onclick="copyToClipboard('sellerEmail')">
                                Copy
                            </button>
                        </p>

                        <p>
                            <strong>Phone:</strong>
                            <span id="sellerPhone">
                                {{ $carListing->user->phone }}
                            </span>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary ms-2"
                                onclick="copyToClipboard('sellerPhone')">
                                Copy
                            </button>

                        </p>

                    </div>

                </div>

                <hr>

                <h5>

                    Description

                </h5>

                <p>

                    {{ $carListing->description }}

                </p>

            </div>

        </div>

    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <script>
        function copyToClipboard(elementId) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text);
            alert('Copied to clipboard!');
        }
    </script>

</body>

</html>