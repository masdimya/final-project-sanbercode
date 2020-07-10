@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="text-center">Welcome to Stuck Overflow</h4>
                    <p class="text-center">Membantu anda semua yang sedang stuck</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
