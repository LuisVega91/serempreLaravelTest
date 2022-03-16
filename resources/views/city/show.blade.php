@extends('layouts.app')

@section('template_title')
    {{ $city->name ?? 'Show City' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show City</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cities.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cod:</strong>
                            {{ $city->cod }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $city->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
