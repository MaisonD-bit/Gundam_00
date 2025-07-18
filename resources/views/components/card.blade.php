<div class="col-md-4 mb-4">
    <a href="{{ route('details', $item->id) }}" class="text-decoration-none">
        <div class="card h-100 shadow-sm">
            @if (!empty($item->image))
                <img src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="object-fit: cover; height: 200px; width: 100%;">
            @else
                <div class="card-img-top d-flex align-items-center justify-content-center bg-secondary text-white" style="height: 200px;">
                    No Image
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                @if (isset($item->organization))
                    <p class="card-text text-muted"><small>{{ $item->organization->name }}</small></p>
                @endif
                @if (isset($item->description))
                    <p class="card-text">{{ $item->description }}</p>
                @endif
            </div>
        </div>
    </a>
</div>
