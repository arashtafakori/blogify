<div>
    @if (Auth::check())
    <button wire:click="likeToggle" type="button" style="position: absolute; bottom: 5px; left: 5px; " class="btn btn-light btn-sm">
        <div style="width: 20px;height: 20px;">
            @if ($isLiked = $post->isLiked())
                <i class="bi bi-heart-fill"></i> 
            @else
                <i class="bi bi-heart"></i>
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

    <div class="rounded fs-6"
        style="background-color: rgba(255, 255, 255, 0.6);
    position: absolute; bottom: 5px; left: 50px; ">
        <div class="px-1">
            {{ $post->countOfLikes() }}
        </div>
    </div>
</div>
