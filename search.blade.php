<div class="container mt-4">

    <!-- Search Header -->
    <div class="mb-4">
        <h5 class="fw-semibold mb-1">
            Hasil pencarian untuk:
            <span class="text-primary">"{{$keyword}}" </span> {{ request('page') ? "/ Halaman " . request('page') : "" }}
        </h5>
        <small class="text-muted">
            Ditemukan {{$index->total()}} hasil
        </small>
    </div>

    <!-- Search Result Grid -->
    <div class="row g-4">

        @forelse($index as $row)

        <div class="col-12 col-md-6">
            <div class="search-item">

                @if($row->type == 'berita')
                    <span class="badge bg-primary mb-2">Berita</span>
                    <h6 class="search-title">
                        <a href="{{ $row->link }}" class="text-decoration-none">
                            {{$row->title}}
                        </a>
                    </h6>
                    <p class="search-excerpt">
                        {{$row->short_content}}
                    </p>
                    <small class="search-meta">
                        {{ $row->created_at->format('d M Y') }} • By {{ $row->user->name }}
                    </small>

                @elseif($row->type == 'download')

                    <span class="badge bg-success mb-2">Download</span>
                    <h6 class="search-title">
                        <a href="{{ $row->link }}" class="text-decoration-none">
                            {{$row->title}}
                        </a>
                    </h6>
                    <div class="search-meta">
                        {{ $row->created_at->format('d M Y') }} • By {{ $row->user->name }}
                    </div>

                @else

                    <span class="badge bg-warning text-dark mb-2">{{str($row->type)->headline()}}</span>
                    <h6 class="search-title">
                        <a href="{{ $row->link }}" class="text-decoration-none">
                            {{$row->title}}
                        </a>
                    </h6>
                    <p class="search-excerpt">
                       {{$row->short_content}}
                    </p>
                    <small class="search-meta">
                        {{ $row->created_at->format('d M Y') }} • By {{ $row->user->name }}
                    </small>

                @endif

            </div>
        </div>

        @empty

        <div class="col-12">
            <div class="alert alert-light">
                Tidak ada hasil yang ditemukan.
            </div>
        </div>

        @endforelse
<div class="col-12">
{{ $index->links('pagination::bootstrap-5') }}
            </div>
    </div>

</div>
