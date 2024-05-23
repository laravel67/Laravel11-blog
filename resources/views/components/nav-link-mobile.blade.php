<a {{ $attributes }}
    class="{{ $active ? 'bg-gray-900' : 'hover:bg-gray-700' }} text-white block rounded-md px-3 py-2 text-base font-medium">{{ $slot }}
</a>