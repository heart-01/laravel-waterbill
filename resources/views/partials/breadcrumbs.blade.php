@if (count($breadcrumbs))
<div class="row justify-content-end">
    <div class="col-auto">
        <h6><small>
            <ol class="breadcrumb bg-light">
                @foreach ($breadcrumbs as $breadcrumb)
                    
                    @if ($breadcrumb->url && !$loop->last)
                        <li class="breadcrumb-item"><a class="text-primary" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                    @else
                        <li class="breadcrumb-item active">{{ $last = $breadcrumb->title }}</li>
                    @endif

                @endforeach
            </ol>
        </small></h6>
    </div>
</div>

<style>
    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
    }
</style>

@endif