
@props([
    'show' => false,
    'title' => '',
    'message' => ''
])

<div class="alert alert-info alert-dismissible fade show"
role="alert" style="position: fixed;z-index: 1000;right:20px; top: 20px"
   x-data="{ show: '{{ $show }}' }"
   x-show="show"
   x-transition
   x-init="setTimeout(() => show = false, 5000)">
   <strong>{{ $title }}</strong> {{ $message }}
   <button type="button" class="btn-close" data-bs-dismiss="alert"
    aria-label="Close"></button>
</div>
