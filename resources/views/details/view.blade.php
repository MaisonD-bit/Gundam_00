@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1 mb-3">
            <button onclick="window.history.back()" class="btn btn-secondary w-100">
                <i class="bi bi-arrow-left"></i> Back
            </button>
        </div>
        <div class="col-md-10 offset-md-1">
            <div class="card">
                @if (!empty($item->image))
                    <div style="height: 400px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}" style="max-height: 100%; max-width: 100%; object-fit: contain;" alt="{{ $item->name }}">
                    </div>
                @else
                    <div class="card-img-top d-flex align-items-center justify-content-center bg-secondary text-white" style="height: 400px;">
                        No Image
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="text-muted">
                        <strong>Affiliation:</strong> {{ $item->organization->name ?? 'Unknown' }}
                    </p>
                    <p class="text-muted">
                        <strong>Pilots:</strong>
                        @if ($item->pilots->isNotEmpty())
                            {{ $item->pilots->pluck('name')->join(', ') }}
                        @else
                            Unknown
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
