@extends('layouts.mobile.app')
@section('content')
<div class="container mt-3">
    @if(count($contents) < 1)
        <h1>Tidak ada produk</h1>
    @endif
    @foreach($contents as $content)
        <div class="col-md-6 col-12 mt-3">
            <div class="card">
                <img class="card-img-top" src="{{ url('/storage/cover/' . $content->cover)  }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $content->title }}</h5>
                    <a href="{{ route('mobile.content.detail', $content->id) }}" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
