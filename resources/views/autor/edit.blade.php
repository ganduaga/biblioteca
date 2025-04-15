<x-layouts.app title="Altas autores">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative">
                <h1 class="text-xl">Edición de autores</h1>
            </div>
            
        </div>
        <div class="relative flex rounded-xl border shadow-lg items-center border-neutral-200 dark:border-neutral-700 px-4">
            <form action="{{ route('autor.update',$autor) }}" method="post">
                @csrf
                @method('PUT')
                <flux:input type="hidden" wire:model="id" value="{{ $autor->id }}" />
                <flux:input type="text" label="Nombre del autor" wire:model="nombre" 
                    placeholder="Ej. Tito Camotito" required  class="w-xl mb-2"
                    value="{{ $autor->nombre }}"/>
                <flux:input type="number" label="Edad del autor" wire:model="edad" 
                    class="w-64" required class="w-xl mb-2"
                    value="{{ $autor->edad }}"/>
                <flux:input type="submit" value="Guardar cambios" class="w-xl mb-4 bg-cyan-500"/>
            </form>
        </div>
    </div>
</x-layouts.app>
