<x-app-layout>
    @if (Auth::check())
    <x-slot name="childPageNav">
        <button type="button" class="btn btn-outline-primary" 
        onclick="window.location='{{ route('posts.create') }}'">
            {{ __('New Post') }}</button>
    </x-slot>
    @if (session('status') === 'post-added')
    <x-alert show="true" title="" message="{{ __('A new post has been sent.') }}" />
    @endif
    @endif

    @if (session('status') === 'post-edited')
        <x-alert show="true" title="" message="{{ __('the post has been edited.') }}" />
    @endif

    @if (session('status') === 'post-deleted')
        <x-alert show="true" title="" message="{{ __('the post has been deleted.') }}" />
    @endif

    <x-slot:title>
        {{ __('Explore posts') }}
    </x-slot:title>

    @foreach ($posts as $post)
        @include('posts.partials.post-card', ['post' => $post])
    @endforeach
    <br>
    <div class="container-fluid d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</x-app-layout>