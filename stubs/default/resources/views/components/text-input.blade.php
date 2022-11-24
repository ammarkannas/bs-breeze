@props([
    'disabled' => false,
    'id' => 'input-' . hash('crc32', uniqid()),
    'label' => false,
    'validation' => false
])

@if($label)
<x-input-label :for="$id" :value="$label" />
@endif

@if($validation)
    @php($attributes = $attributes->merge(['class' => $errors->has($attributes->get('name')) ? 'is-invalid' : null]))
@endif

<input {!! $attributes->merge(['class' => 'form-control', 'id' => $id]) !!} {{ $disabled ? 'disabled' : '' }} >
