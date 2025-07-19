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
            <div class="card border-0" style="background-color: #1a1a1a; color: #ffffff;">
                
                {{-- Image Section with White Background --}}
                @if (!empty($item->image))
                    <div class="bg-white d-flex justify-content-center align-items-center" style="height: 450px; padding: 20px;">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}" alt="{{ $item->name }}" 
                             style="max-height: 100%; max-width: 100%; object-fit: contain;">
                    </div>
                @else
                    <div class="card-img-top d-flex align-items-center justify-content-center bg-secondary text-white" style="height: 450px;">
                        No Image
                    </div>
                @endif

                {{-- Card Body --}}
                <div class="card-body px-4 py-4">
                    <h4 class="card-title mb-3">{{ $item->name }}</h4>

                    @if (!empty($item->description))
                        <p class="card-text" style="color: #dddddd;">{{ $item->description }}</p>
                    @endif

                    <p class="text-muted mb-1">
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
