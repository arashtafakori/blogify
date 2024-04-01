<div>
    @if (Auth::check())
    <button wire:key="bookmarkBtn-{{$post->id}}" wire:click="bookmarkToggle" type="button" 
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
    <button wire:key="bookmarkBtn-{{$post->id}}" onclick="window.location='{{ route('login') }}'" type="button" style="position: absolute; bottom: 5px; right: 5px;" class="btn btn-light btn-sm">
        <div style="width: 20px;height: 20px;">
            <i class="bi bi-bookmark"></i>
        </div>
    </button>
    @endif
</div>
