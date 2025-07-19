<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gundam 00</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #111111;
            color: #f1f1f1;
        }

        .card {
            background-color: #1a1a1a;
            color: #ffffff;
        }

        .card .card-title {
            color: #ffffff;
        }

        .card .card-text {
            color: #dddddd; /* slightly dimmed white for readability */
        }

        .form-control,
        .form-select {
            background-color: #222;
            color: #f1f1f1;
            border: 1px solid #444;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #222;
            color: #fff;
            border-color: #666;
        }

        .card-hover:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.1);
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        .navbar, .footer {
            background-color: #111111;
        }

        .text-muted {
            color: #bbb !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('search') }}">Gundam Archive</a>
    </div>
</nav>

<div class="container mb-4">
    <form action="{{ route('search') }}" method="GET" class="row g-2 align-items-end">
        @csrf
        <div class="col-md-3">
            <input type="text" name="query" class="form-control" placeholder="Search..." value="{{ request('query') }}">
        </div>

        <div class="col-md-2">
            <select name="pilot" class="form-select">
                <option value="">All Pilots</option>
                @foreach ($pilots as $pilot)
                    <option value="{{ $pilot->id }}" {{ request('pilot') == $pilot->id ? 'selected' : '' }}>{{ $pilot->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="gundam" class="form-select">
                <option value="">All Gundams</option>
                @foreach ($gundamsFilter as $gundam)
                    <option value="{{ $gundam->id }}" {{ request('gundam') == $gundam->id ? 'selected' : '' }}>{{ $gundam->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="grunt" class="form-select">
                <option value="">All Grunt Suits</option>
                @foreach ($gruntsFilter as $grunt)
                    <option value="{{ $grunt->id }}" {{ request('grunt') == $grunt->id ? 'selected' : '' }}>{{ $grunt->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="organization" class="form-select">
                <option value="">All Affiliations</option>
                @foreach ($organizations as $org)
                    <option value="{{ $org->id }}" {{ request('organization') == $org->id ? 'selected' : '' }}>{{ $org->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-1">
            <button class="btn btn-primary w-100">Search</button>
        </div>
    </form>
</div>

@yield('content')

<footer class="text-center py-4 text-muted small footer">
    Gundam Archive &copy; {{ date('Y') }}
</footer>

</body>
</html>
