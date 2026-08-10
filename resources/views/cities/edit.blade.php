<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit City</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-dark">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card bg-black border-secondary">

                    <div class="card-body p-4">

                        <h2 class="mb-4">
                            Edit City
                        </h2>

                        <form
                            action="{{ route('cities.update', $city) }}"
                            method="POST"
                        >

                            @csrf

                            @method('PUT')

                            <div class="mb-3">

                                <label class="form-label">
                                    City Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $city->name) }}"
                                    placeholder="Enter city name"
                                >

                                @error('name')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('cities.index') }}"
                                    class="btn btn-secondary"
                                >
                                    Cancel
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Update City
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>