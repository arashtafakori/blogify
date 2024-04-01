
<div class="container-fluid d-flex justify-content-center">
    <div class="card mb-3" style="width: 70%;">
        <div class="row g-0">
            <div class="col-md-4">
                @if (!Route::is('posts.show-post'))
                <a href="{{ route('posts.show-post', $post->id) }}">
                    {{-- <img class="card-img-top" src="{{ asset('images/dish.png') }}"
                        alt="Your Image"> --}}
                    <img class="card-img-top" src="{{ asset('storage/' . $post->image?->path) }}"
                        alt="Your Image">
                </a>
                @else
                    <img class="card-img-top" src="{{ asset('storage/' . $post->image?->path) }}"
                        alt="Your Image">
                @endif

                <div style="position: relative;">
                    <livewire:like :post="$post" /> 
    
                    <div class="rounded fs-6"
                        style="background-color: rgba(255, 255, 255, 0.6);
                    position: absolute; bottom: 5px; right: 50px; ">
                        <div class="px-1" style="font-size: smaller;">
                            {{ $post->created_at->format('j M Y H:i:s') }}
                        </div>
                    </div>
    
                    <livewire:bookmark :post="$post" /> 
                </div>
            </div>
    
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row w-100">
                        <div class="col d-flex justify-content-between">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            @if ($post->user->is(auth()->user()))
                            <div>
                                <div class="btn-group" style="position: absolute; top: 5px; right: 5px;">
                                    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <div style="width: 20px;height: 20px;">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </div>
                                    </button>
    
                                    <ul class="dropdown-menu">
                                        @if (!Route::is('posts.show-post'))
                                        <li><a class="dropdown-item" 
                                            href="{{ route('posts.show-post', $post->id) }}">
                                            See details</a></li>
                                        @endif

                                        <li><a class="dropdown-item" 
                                            href="{{ route('posts.edit', $post->id) }}">
                                            Edit</a></li>

                                        <li><a class="dropdown-item" 
                                            data-bs-toggle="modal"
                                             data-bs-target="#staticBackdrop">
                                             Remove</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
    
                    <h6 style=" font-weight: bold;">"{{ $post->description }}"</h6>
                    @if ($post->user->is(auth()->user()))
                        <div style="color: gray">By: {{ $post->user->name }}</div>
                    @endif
                    <x-paragraph-more
                        text="{{ $post->content }}" />
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Confirm removing</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure, you want to remove the post?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

          <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('delete')
                <button type="submit" href="{{ route('posts.destroy', $post) }}" 
                type="button" class="btn btn-danger">Remove for ever</button>
            </form>

        </div>
      </div>
    </div>
  </div>
