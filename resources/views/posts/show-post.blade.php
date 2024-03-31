<x-app-layout>
    @if (session('status') === 'post-edited')
        <x-alert show="true" title="" message="{{ __('the post has been edited.') }}" />
    @endif

    @if (session('status') === 'post-deleted')
        <x-alert show="true" title="" message="{{ __('the post has been deleted.') }}" />
    @endif

    <x-slot:title>
        {{ __('The post details') }}
    </x-slot:title>

    @include('posts.partials.post-card', ['post' => $post])
</x-app-layout>