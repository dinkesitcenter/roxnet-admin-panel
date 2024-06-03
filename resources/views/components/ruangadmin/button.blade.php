<button class="btn btn-{{ $type }} mt-3" type="{{ ($for) ?? 'button' }}" {{ isset($wire) ? 'wire:click.prevent='.$wire :'' }}>{{ $text }}
</button>