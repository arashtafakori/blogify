<x-app-layout>
    <x-slot:title>
        {{ __('Edit the post') }}
    </x-slot:title>
    {{-- Edit the post . {{route('posts.edit-post', 1)}} --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit the post') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            
                            <div class="row mb-3">
                                <img x-data :class="$store.postStore.imageVisibility"
                                    x-show="$store.postStore.imageVisibility" id="selectedAvatar"
                                    src="{{ asset('storage/' . $post->image?->path) }}"
                                    alt="Food Image">
                            </div>

                            <div class="row mb-3">
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="btn btn-outline-primary btn-sm">
                                        <label class="form-label m-1" for="postImage">
                                            {{ __('Choose an image') }}
                                        </label>
                                        <input type="file" class="form-control d-none" id="postImage"
                                            name="postImage"
                                            onchange="displaySelectedImage(event, 'selectedAvatar')" />
                                    </div>

                                    <button type="button" style="display: none;"
                                        class="mx-2 btn btn-outline-danger btn-sm" x-data
                                        :class="$store.postStore.imageVisibility"
                                        x-show="$store.postStore.imageVisibility"
                                        @click="$store.postStore.closeImage()">
                                        <div style="width: 23px;height: 23px;">
                                            <i class="bi bi-trash"></i>
                                        </div>
                                    </button>
                                </div>

                                <div class="d-flex justify-content-center mb-3">
                                   @error('postImage')
                                   <div class="text-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title', $post->title) }}" autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text"
                                        class="form-control @error('description') is-invalid @enderror"
                                        name="description" 
                                        value="{{ old('description', $post->description) }}"
                                         autocomplete="description"
                                        autofocus>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" rows="5" maxlength="1000" name="content"
                                    >{{ old('content', $post->content) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="d-flex justify-content-center mb-3">
                                    <button id="cancelButton" class="mx-2 btn btn-secondary">
                                        {{ __('Cancel') }}
                                    </button>
                                    <button type="submit" class="mx-2 btn btn-primary">
                                        {{ __('Edit Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('cancelButton').addEventListener('click', function(event) {
        event.preventDefault();
        window.history.back();
        window.location="{{ route('posts.my-posts') }}";
    });

    function displaySelectedImage(event, elementId) {
         const selectedImage = document.getElementById(elementId);
         const fileInput = event.target;

         if (fileInput.files && fileInput.files[0]) {
             const reader = new FileReader();

             reader.onload = function(e) {
                 selectedImage.src = e.target.result;
                 Alpine.store('postStore').showImage(selectedImage.src);
             };

             reader.readAsDataURL(fileInput.files[0]);
         }
     }

     document.addEventListener('alpine:init', () => {
         Alpine.store('postStore', {
             init() {
                 this.imageVisibility = true;
                 this.imageSrc = "{{ asset('storage/' . $post->image?->path) }}";
             },
             imageVisibility: false,
             imageSrc: '',
             showImage(src) {
                 this.imageSrc = src;
                 this.imageVisibility = true;
             },
             closeImage() {
                 this.imageSrc = '';
                 this.imageVisibility = false;
                 document.getElementById("postImage").value = null;
             }
         })
     })
</script>
