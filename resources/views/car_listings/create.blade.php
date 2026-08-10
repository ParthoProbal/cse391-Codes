<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Car Listing</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-dark">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card bg-black border-secondary">

                    <div class="card-body p-4">

                        <h2 class="mb-4">
                            Add Car Listing
                        </h2>

                        <form
                            action="{{ route('car_listings.store') }}"
                            method="POST"
                        >

                            @csrf

                            <!-- Brand -->

                            <div class="mb-3">

                                <label class="form-label">
                                    Brand
                                </label>

                                <select
                                    name="brand_id"
                                    class="form-select @error('brand_id') is-invalid @enderror"
                                >

                                    <option value="">
                                        Select Brand
                                    </option>

                                    @foreach($brands as $brand)

                                        <option
                                            value="{{ $brand->id }}"
                                            {{ old('brand_id') == $brand->id ? 'selected' : '' }}
                                        >
                                            {{ $brand->name }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- City -->

                            <div class="mb-3">

                                <label class="form-label">
                                    City
                                </label>

                                <select
                                    name="city_id"
                                    class="form-select @error('city_id') is-invalid @enderror"
                                >

                                    <option value="">
                                        Select City
                                    </option>

                                    @foreach($cities as $city)

                                        <option
                                            value="{{ $city->id }}"
                                            {{ old('city_id') == $city->id ? 'selected' : '' }}
                                        >
                                            {{ $city->name }}
                                        </option>

                                    @endforeach

                                </select>

                                @error('city_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Title -->

                            <div class="mb-3">

                                <label class="form-label">
                                    Listing Title
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}"
                                    placeholder="Example: Toyota Corolla 2020"
                                >

                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Model -->

                            <div class="mb-3">

                                <label class="form-label">
                                    Model
                                </label>

                                <input
                                    type="text"
                                    name="model"
                                    class="form-control @error('model') is-invalid @enderror"
                                    value="{{ old('model') }}"
                                    placeholder="Example: Corolla"
                                >

                                @error('model')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="row">

                                <!-- Year -->

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Year
                                    </label>

                                    <input
                                        type="number"
                                        name="year"
                                        class="form-control @error('year') is-invalid @enderror"
                                        value="{{ old('year') }}"
                                    >

                                    @error('year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- Price -->

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Price
                                    </label>

                                    <input
                                        type="number"
                                        name="price"
                                        step="0.01"
                                        class="form-control @error('price') is-invalid @enderror"
                                        value="{{ old('price') }}"
                                        placeholder="Example: 18500"
                                    >

                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>


                            <div class="row">

                                <!-- Mileage -->

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        Mileage
                                    </label>

                                    <input
                                        type="number"
                                        name="mileage"
                                        class="form-control @error('mileage') is-invalid @enderror"
                                        value="{{ old('mileage') }}"
                                        placeholder="Example: 50000"
                                    >

                                    @error('mileage')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- Fuel -->

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        Fuel Type
                                    </label>

                                    <select
                                        name="fuel_type"
                                        class="form-select @error('fuel_type') is-invalid @enderror"
                                    >

                                        <option value="">
                                            Select Fuel
                                        </option>

                                        <option value="Petrol">
                                            Petrol
                                        </option>

                                        <option value="Diesel">
                                            Diesel
                                        </option>

                                        <option value="Hybrid">
                                            Hybrid
                                        </option>

                                        <option value="Electric">
                                            Electric
                                        </option>

                                    </select>

                                    @error('fuel_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <!-- Transmission -->

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        Transmission
                                    </label>

                                    <select
                                        name="transmission"
                                        class="form-select @error('transmission') is-invalid @enderror"
                                    >

                                        <option value="">
                                            Select Transmission
                                        </option>

                                        <option value="Automatic">
                                            Automatic
                                        </option>

                                        <option value="Manual">
                                            Manual
                                        </option>

                                    </select>

                                    @error('transmission')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>


                            <!-- Description -->

                            <div class="mb-4">

                                <label class="form-label">
                                    Description
                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Describe the car..."
                                >{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('car_listings.index') }}"
                                    class="btn btn-secondary"
                                >
                                    Cancel
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Submit Listing
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