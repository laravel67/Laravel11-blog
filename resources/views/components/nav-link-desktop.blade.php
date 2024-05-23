@props(['active'=> false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-gray-900' : 'hover:bg-gray-700' }} text-white rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page':false }}">{{ $slot }}
</a>