<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Car Brands</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark">
    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h1>Car Brands</h1>

                <p class="text-secondary mb-0">
                    Available car brands.
                </p>

            </div>

            <div class="d-flex gap-2">

                <a href="{{ route('home') }}" class="btn btn-outline-light">
                    Home
                </a>

                <a href="{{ route('brands.create') }}" class="btn btn-primary">
                    Add Brand
                </a>

            </div>

        </div>


        <div class="card bg-black border-secondary">

            <div class="card-body">

                @if($brands->count() > 0)

                <div class="list-group">

                    @foreach($brands as $brand)

                    <div class="list-group-item bg-dark text-light border-secondary">

                        <div class="d-flex justify-content-between align-items-center">

                            <span>
                                {{ $brand->name }}
                            </span>

                            <div class="d-flex gap-2">

                                <a href="{{ route('brands.edit', $brand) }}" class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>

                                <form action="{{ route('brands.destroy', $brand) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this brand?')">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

                @else

                <p class="text-secondary mb-0">
                    No brands available.
                </p>

                @endif

            </div>

        </div>

    </div>

</body>

</html>