@props(['slot'])

<div class="text-red-600">
    {{ $slot ?? 'Erro de validação' }}
</div>
