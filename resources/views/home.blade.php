<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AutoMarket</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-dark text-light">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-secondary">
        <div class="container">

            <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
                Auto<span class="text-primary">Market</span>
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavigation">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Browse Cars
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Contact
                        </a>
                    </li>

                </ul>

                <div class="d-flex gap-2">

                    @guest
                        <a href="{{ url('/login') }}" class="btn btn-outline-light">
                            Login
                        </a>

                        <a href="{{ url('/register') }}" class="btn btn-primary">
                            Register
                        </a>
                    @else
                        <a href="#" class="btn btn-primary">
                            Dashboard
                        </a>
                    @endguest

                </div>

            </div>

        </div>
    </nav>


    <!-- Hero Section -->
    <section class="py-5">
        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-7">

                    <span class="badge bg-primary mb-3">
                        Find Your Next Car
                    </span>

                    <h1 class="display-3 fw-bold mb-4">
                        Find the right car
                        <span class="text-primary">for you.</span>
                    </h1>

                    <p class="lead text-secondary mb-4">
                        Browse quality used cars from trusted sellers.
                        Search by brand, city, price and more.
                    </p>

                    <a href="#" class="btn btn-primary btn-lg">
                        Browse Cars
                    </a>

                </div>

                <div class="col-lg-5">

                    <img
                        src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&w=1000&q=80"
                        class="img-fluid rounded-4 shadow-lg"
                        alt="Used car"
                    >

                </div>

            </div>

        </div>
    </section>


    <!-- Search Section -->
    <section class="py-4">
        <div class="container">

            <div class="card bg-black border-secondary shadow">

                <div class="card-body p-4">

                    <h3 class="fw-bold mb-4">
                        Find Your Car
                    </h3>

                    <form>

                        <div class="row g-3">

                            <div class="col-lg-4">

                                <label class="form-label">
                                    Search
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Toyota, Honda, BMW..."
                                >

                            </div>

                            <div class="col-lg-2">

                                <label class="form-label">
                                    Brand
                                </label>

                                <select class="form-select">

                                    <option>All Brands</option>
                                    <option>Toyota</option>
                                    <option>Honda</option>
                                    <option>BMW</option>

                                </select>

                            </div>

                            <div class="col-lg-2">

                                <label class="form-label">
                                    City
                                </label>

                                <select class="form-select">

                                    <option>All Cities</option>
                                    <option>Dhaka</option>
                                    <option>Chittagong</option>

                                </select>

                            </div>

                            <div class="col-lg-2">

                                <label class="form-label">
                                    Max Price
                                </label>

                                <select class="form-select">

                                    <option>Any Price</option>
                                    <option>$10,000</option>
                                    <option>$20,000</option>
                                    <option>$30,000</option>

                                </select>

                            </div>

                            <div class="col-lg-2 d-flex align-items-end">

                                <button class="btn btn-primary w-100">
                                    Search
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </section>


    <!-- Featured Cars -->
    <section class="py-5">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold">
                        Featured Cars
                    </h2>

                    <p class="text-secondary">
                        Explore some of our latest listings.
                    </p>

                </div>

                <a href="#" class="btn btn-outline-light">
                    View All
                </a>

            </div>


            <div class="row g-4">

                @foreach ($featuredCars as $car)

                    <div class="col-md-6 col-lg-4">

                        <div class="card bg-black border-secondary h-100 shadow-sm">

                            <img
                                src="{{ $car['image'] }}"
                                class="card-img-top"
                                alt="{{ $car['name'] }}"
                                style="height: 220px; object-fit: cover;"
                            >

                            <div class="card-body">

                                <div class="d-flex justify-content-between">

                                    <h5 class="fw-bold">
                                        {{ $car['name'] }}
                                    </h5>

                                    <span class="badge bg-secondary">
                                        {{ $car['year'] }}
                                    </span>

                                </div>

                                <p class="text-secondary">
                                    {{ $car['location'] }}
                                </p>

                                <h4 class="text-primary">
                                    {{ $car['price'] }}
                                </h4>

                            </div>

                            <div class="card-footer bg-black border-secondary">

                                <a href="#" class="btn btn-outline-primary w-100">
                                    View Details
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    <!-- Footer -->
    <footer class="border-top border-secondary py-4">

        <div class="container d-flex justify-content-between">

            <span>
                Auto<span class="text-primary">Market</span>
            </span>

            <span class="text-secondary">
                &copy; {{ date('Y') }} AutoMarket
            </span>

        </div>

    </footer>


    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>