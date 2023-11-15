<x-filament-widgets::widget>
    <x-filament::section>
        <h1>Total score (Q ) over number of targets (N)  Q/N: {{ $average}}</h1>

        <div>
            <label>
                <input type="radio" wire:model="rating" value="Unsatisfactory" readonly> Unsatisfactory (1 to 1.5)
            </label>
        </div>
        <div>
            <label>
                <input type="radio" wire:model="rating" value="Marginal" readonly> Marginal (1.6 to 2.5)
            </label>
        </div>
        <div>
            <label>
                <input type="radio" wire:model="rating" value="Good" readonly> Good (2.6 to 3.5)
            </label>
        </div>
        <div>
            <label>
                <input type="radio" wire:model="rating" value="Very Good" readonly> Very Good (3.6 to 4.5)
            </label>
        </div>
        <div>
            <label>
                <input type="radio" wire:model="rating" value="Excellent" readonly> Excellent (4.6 to 5)
            </label>
        </div>



    </x-filament::section>
</x-filament-widgets::widget>
