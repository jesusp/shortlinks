@extends('web.layout')

@section('content')

    <div  class="about-area area-padding">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center ">
                        <h2 class="mb-2">Short Links hit counter</h2>
                        <p class="fs-6">Number of clicks a short link has received.</p>
                    </div>
                </div>
            </div>
            <form method="GET">
                <div class="row pt-0 p-3">
                    <!-- single-well start-->
                    <div class="col">
                        <div class="input-group input-group-lg">
                            <input required name="u" value="{{ $u ?? '' }}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Enter the link here">
                            <button class="btn btn-primary" type="submit">Track Clicks</button>
                        </div>
                    </div>
                </div>
                <div class="fs-6 pt-3">
                    <strong>Short Link:</strong> <a href="{{ $link }}" target="_blank">{{ $link }}</a>
                </div>
                <div class="fs-5 py-3">
                    <strong><span class="fs-1">{{ $clicks }}</span></strong> Clicks
                </div>

                <a href="/" class="btn btn-primary mt-3">Shorten another URL</a>
            </form>

        </div>
    </div>

@stop