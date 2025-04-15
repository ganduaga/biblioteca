<x-layouts.app title="Autores">
    @if (session()->has("mensaje"))
        <script>
            alert("{{ session()->get('mensaje') }}");
        </script>
    @endif
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid grid-cols-3">
            <div class="relative object-center content-center">
                <h1 class="text-xl">Administración de libros</h1>
            </div>
            <div class="relative items-center content-center">
            <div class="relative flex rounded-xl border items-center shadow-lg border-neutral-200 dark:border-neutral-700 px-4 mb-2">
            <form action="{{ route('libro.buscar') }}" method="post">
                @csrf
                <flux:input type="text" label="Buscar libro" wire:model="libro" 
                    placeholder="Ej. Laravel oficial" required  class="w-lg mb-2"/>
                <flux:input type="submit" value="Buscar" class="w-lg mb-4 bg-cyan-500"/>
            </form>
        </div>
            </div>
            <div class="fixed top-5 right-10">
                <flux:button href="{{ route('libro.create') }}" variant="primary" class="object-center inline-block">Agregar Libro</flux:button>
            </div>
        </div>
        <div class="relative flex rounded-xl shadow-lg">
                
            @foreach ($libros as $libro)

            <div class="max-w-sm w-full lg:max-w-full lg:flex mr-2">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{ asset("storage/".$libro->portada) }}')">
                </div>
                <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                  <div class="mb-8">
                    <p class="text-sm text-gray-600 flex items-center">
                      {{ $libro->autores->nombre }}
                    </p>
                    <div class="text-gray-900 font-bold text-xl mb-2">
                        <a href="{{ route("libro.show",$libro) }}">
                            {{ $libro->titulo }}
                        
                    </div>
                    <p class="text-gray-700 text-base">
                        ISBN.- {{ $libro->ISBN }} <br>
                        </a>
                        Editorial.- {{ $libro->editorial }} <br>
                        Fecha de publicación.- {{ $libro->fechaPublicacion }} <br>
                        Tema.- {{ $libro->tema }}<br>
                        Disponibles.- {{ $libro->numcopias }} <br>
                    </p>
                  </div>
                  <div class="flex items-center"> 
                    <div class="text-sm">
                       <flux:button href="{{ route('libro.edit', $libro) }}" variant="filled" class="object-center inline-block">Editar Libro</flux:button>
                        <form action="{{ route("libro.destroy",$libro) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <flux:button variant="danger" type="submit" 
                                class="object-center inline-block"
                                onclick="return confirm('Estas seguro?')">
                                Borrar Autor
                            </flux:button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
