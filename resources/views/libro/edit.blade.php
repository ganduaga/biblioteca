<x-layouts.app title="Edición de libros">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative">
                <h1 class="text-xl">Edición de libros</h1>
            </div>
            
        </div>
        <div class="relative flex rounded-xl border shadow-lg items-center border-neutral-200 dark:border-neutral-700 px-4">
            <form action="{{ route('libro.update',$libro) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT');
                <flux:input type="text" label="Titulo" wire:model="titulo" value="{{ $libro->titulo }}"
                    placeholder="Ej. El santo contra las momias" required  class="w-xl mb-2"/>
                <flux:input type="text" label="ISBN" wire:model="ISBN" value="{{ $libro->ISBN }}"
                    placeholder="Ej. ISBN 978-607-638-172-4." required  class="w-xl mb-2"/>
                <flux:select wire:model="autor_id" placeholder="Elije autor"  class="mb-2 w-xl pl-4">
                        @foreach ($autores as $autor)
                        <flux:select.option value="{{ $autor->id }}">
                            {{ $autor->nombre }}
                        </flux:select.option>
                        @endforeach
                </flux:select>
                <flux:input type="file" label="Imagen de la portada" wire:model="portada" 
                  class="w-xl mb-2" accept="image/*" value="{{ $libro->portada }}"/>
                <flux:input type="text" label="Editorial" wire:model="editorial" 
                placeholder="Ej. Ed. Purrua" required  class="w-xl mb-2" value="{{ $libro->editorial }}"/>
                <flux:input type="text" label="Temas que abarca" wire:model="tema" value="{{ $libro->tema }}"
                placeholder="Ej. Ciencia ficción" required  class="w-xl mb-2"/>
                <flux:input type="date" label="Fecha de publicación" wire:model="fechaPublicacion" 
                placeholder="Ej. Ciencia ficción" required  class="w-xl mb-2" value="{{ $libro->fechaPublicacion }}"/>
                <flux:input type="number" label="Cantidad en existencia" name="numcopias" 
                    class="w-64" required class="w-xl mb-2" value="{{ $libro->numcopias }}"/>
                <flux:input type="submit" value="Guardar cambios" class="w-xl mb-4 bg-cyan-500"/>
            </form>
        </div>
    </div>
</x-layouts.app>

