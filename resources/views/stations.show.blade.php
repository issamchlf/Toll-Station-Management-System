@extends('layouts.app')

@section('content')


@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Station Details') }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td>{{ $station->name }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $station->location }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $station->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $station->updated_at }}</td>
                        </tr>
                    </table>

                    <h4>{{ __('Pivot Details') }}</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Detail 1</th>
                                <th>Detail 2</th>
                                <th>Detail 3</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($station->pivotDetails as $detail)
                                <tr>
                                    <td>{{ $detail->detail1 }}</td>
                                    <td>{{ $detail->detail2 }}</td>
                                    <td>{{ $detail->detail3 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="/station" class="btn btn-primary">Back to Stations</a>
                </div>
            </div>
        </div>
    </div>
</div>