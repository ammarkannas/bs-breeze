@props(['active'])

@php($classes = ($active ?? false) ? 'nav-link active' : 'nav-link')

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
