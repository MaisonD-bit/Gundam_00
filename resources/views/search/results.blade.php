@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-3 g-4">
        @foreach($items as $item)
            <div class="col">
                <a href="{{ route('details', ['type' => $item->type, 'id' => $item->id]) }}">
                    <div class="card h-100 shadow-sm card-hover" style="height: 350px;">
                        @if (!empty($item->image))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="object-fit: cover; height: 200px; width: 100%;">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-secondary text-white" style="height: 200px;">
                                No Image
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="text-muted mb-1 mt-auto">
                                <strong>Affiliation:</strong> {{ $item->organization->name ?? 'Unknown' }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        <div class="d-flex justify-content-center">
            {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
