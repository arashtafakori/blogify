<div>
    @if (Auth::check())
    <button wire:click="bookmarkToggle" type="button" 
    style="position: absolute; bottom: 5px; right: 5px;"
        class="btn btn-light btn-sm">
        <div style="width: 20px;height: 20px;">
            @if ($isBookmarked = $post->isBookmarked())
                <i class="bi bi-bookmark-fill"></i>
            @else
                <i class="bi bi-bookmark"></i>
            @endif
        </div>
    </button>
    @else
    <button onclick="window.location='{{ route('login') }}'" type="button" style="position: absolute; bottom: 5px; left: 5px; " class="btn btn-light btn-sm">
        <div style="width: 20px;height: 20px;">
            <i class="bi bi-heart"></i>
        </div>
    </button>
    @endif
</div>
