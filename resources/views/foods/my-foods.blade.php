<x-app-layout>
    <x-slot name="childPageNav">
        <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('foods.new-post') }}'">
            {{ __('New Post') }}</button>
            
        @if (session('status') === 'post-added')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                {{ __('Post added.') }}</p>
        @endif
    </x-slot>
    <x-slot:title>
        My foods
    </x-slot:title>
    <div class="container-fluid d-flex justify-content-center">
        <div class="card mb-3" style="width: 70%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img class="card-img-top" src="{{ asset('images/warm_potato_salad-1024x819.jpg') }}"
                        alt="Your Image">

                    <div style="position: relative;">
                        <button type="button" style="position: absolute; bottom: 5px; left: 5px; "
                            class="btn btn-light btn-sm">
                            <div style="width: 20px;height: 20px;">
                                <i class="bi bi-heart"></i>
                                {{-- <i class="bi bi-heart-fill"></i> --}}
                            </div>
                        </button>

                        <button type="button" style="position: absolute; bottom: 5px; right: 5px;"
                            class="btn btn-light btn-sm">
                            <div style="width: 20px;height: 20px;">
                                <i class="bi bi-bookmark"></i>
                                {{-- <i class="bi bi-bookmark-fill"></i> --}}
                            </div>
                        </button>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row w-100">
                            <div class="col d-flex justify-content-between">

                                <h5 class="card-title">Warm Potato Salad</h5>
                                <div>

                                    <div class="btn-group" style="position: absolute; top: 5px; right: 5px;">
                                        <button type="button" class="btn btn-light btn-sm" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <div style="width: 20px;height: 20px;">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </div>
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Remove</a></li>
                                        </ul>
                                    </div>



                                    {{-- <button type="button" class="btn btn-outline-danger btn-sm">
                                        <div style="width: 20px;height: 20px;">
                                            <x-coolicon-trash-full />
                                        </div>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <row>
                            <div>
                                <p class="card-title p-2">By: Arash Tafakori</p>
                            </div>
                            <div>
                                <button type="button"
                                 class="mx-2 btn btn-outline-danger btn-sm" >
                                    <div style="width: 23px;height: 23px;">
                                        <x-coolicon-trash-full />
                                    </div>
                                  </button>
                            </div>
                        </row> --}}

                        <h6 style=" font-weight: bold;">Appetizer & Snack Vegetarian & Vegan</h6>
                        <div style="color: gray">By: Arash Tafakori</div>
                        <x-paragraph-more
                            text="Tender potatoes delicately cooked and tossed with a creamy dressing, harmonizing tangy vinegar and savory mustard. Each bite offers a comforting warmth, heightened by the gentle infusion of herbs and spices. The potatoes, soft yet retaining their texture, provide a satisfying contrast to the crispness of finely diced onions and celery. This classic dish exudes nostalgia and culinary comfort, perfect for both casual gatherings and elegant affairs alike. Its versatility ensures it's a timeless addition to any table, inviting indulgence with every spoonful." />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
