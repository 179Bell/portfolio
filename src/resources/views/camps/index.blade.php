@extends('layouts.view')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-9">
                <form action="{{ route('camps.search') }}" method="POST">
                    @csrf
                    @method('GET')
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="キャンプ場を探す？" name="keyword">
                        <div class="input-group-btn">
                            <button class="btn btn-lg btn-success" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ( $camps as $camp )
        <div class="card mt-3">
            @include('commons.card')
            @include('commons.button')
        </div>       
    @endforeach

    <div class="col-lg-6 mx-auto d-flex justify-content-center mt-3">
        {{ $camps->links() }}
    </div>


@endsection('content')