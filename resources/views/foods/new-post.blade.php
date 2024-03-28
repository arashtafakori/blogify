 <x-app-layout>
     {{-- <x-slot name="header">
        {{ __('Add a new post') }}
    </x-slot> --}}
     <x-slot:title>
         {{ __('New post') }}
     </x-slot:title>
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">{{ __('New post') }}</div>
                     <div class="card-body">
                         <form method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
                             @csrf
                             <div class="row mb-3">
                                 {{-- <x-image-uploader /> --}}
                                 {{-- <x-image-uploader src="{{ asset('images/warm_potato_salad-1024x819.jpg') }}" /> --}}
                                 {{-- @include('foods.partials.image-uploader') --}}
                                 {{-- <img id="selectedAvatar" src="{{ asset('images/dish.png') }}" alt="Food Image" > --}}
                                 <img x-data :class="$store.postStore.imageVisibility"
                                     x-show="$store.postStore.imageVisibility" id="selectedAvatar" src="#"
                                     alt="Food Image">
                             </div>

                             <div class="row mb-3">
                                 <div class="d-flex justify-content-center mb-3">
                                     <div class="btn btn-outline-primary btn-sm">
                                         <label class="form-label m-1" for="foodImage">
                                             {{ __('Choose an image') }}
                                         </label>
                                         <input type="file" class="form-control d-none" id="foodImage"
                                             name="foodImage"
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
                                    @error('foodImage')
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
                                         value="{{ old('title') }}" autocomplete="title" autofocus>

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
                                         name="description" value="{{ old('description') }}" autocomplete="description"
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
                                     <textarea class="form-control" rows="5" maxlength="1000" name="content"></textarea>
                                 </div>
                             </div>

                             <div class="row mb-3">
                                 <div class="d-flex justify-content-center mb-3">
                                     <button type="submit" class="mx-2 btn btn-primary">
                                         {{ __('Send Post') }}
                                     </button>
                                     <button id="cancelButton" class="mx-2 btn btn-secondary">
                                         {{ __('Cancel') }}
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
         window.location="{{ route('foods.my-foods') }}";
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
                 this.imageVisibility = false;
                 this.imageSrc = '';
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
                 document.getElementById("foodImage").value = null;
             }
         })
     })
 </script>
