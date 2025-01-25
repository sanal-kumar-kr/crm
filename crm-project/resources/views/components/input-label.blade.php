@props(['value'])

<label {{ $attributes->merge(['class' => 'block fw-bold text-white font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
