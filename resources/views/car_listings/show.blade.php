@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card bg-dark border-secondary text-light">

        <div class="card-body">

            <h2 class="mb-4">

                {{ $carListing->title }}

            </h2>

            <div class="row">

                <div class="col-md-6">

                    <img
                        src="https://placehold.co/600x400"
                        class="img-fluid rounded"
                        alt="Car Image">

                </div>

                <div class="col-md-6">

                    <h4 class="mb-3">

                        ${{ number_format($carListing->price) }}

                    </h4>

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

                        {{ $carListing->user->name }}

                    </p>

                </div>

            </div>

            <hr>

            <h5>Description</h5>

            <p>

                {{ $carListing->description }}

            </p>

        </div>

    </div>

</div>

@endsection