<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumbs as $breadcrumb)
                        <li class="breadcrumb-item">
                            @if ($loop->last)
                                <span>{{ $breadcrumb['name'] }}</span>
                            @else
                                <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
