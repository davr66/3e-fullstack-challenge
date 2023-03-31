<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{route('products-cad')}}">Cadastrar Produto</a>
                    </div>
                    <div>
                    <form action="{{route('products-deleteM')}}" method="post">
                    @csrf
                    <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3"></th>
                                <th scope="col" class="px-6 py-3">Nome</th>
                                <th scope="col" class="px-6 py-3">Peso</th>
                                <th scope="col" class="px-6 py-3">Código de Barras</th>
                                <th scope="col" class="px-6 py-3">Valor</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><input type="checkbox" name="ids[{{$product->id_prod}}]" value="{{$product->id_prod}}"></td>
                                    <td scope="col">{{$product->name}}</td>
                                    <td scope="col">{{str_replace('.',',',$product->weigth)}}</td>
                                    <td scope="col">{{$product->bar_code}}</td>
                                    <td scope="col">{{str_replace('.',',',$product->value)}}</td>
                                    @if($product->status)
                                    <td scope="col">Ativo</td>
                                    @else
                                    <td scope="col">Inativo</td>
                                    @endif
                                    <td class="flex">
                                        {{-- ATIVAR/DESATIVAR PRODUTOS --}}
                                        <div class="px-6">
                                        <a href="{{route('products-onOff',['id' => $product->id_prod])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                            <path d="M7.5 1v7h1V1h-1z"/>
                                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                                          </svg></a>
                                        {{-- EDITAR PRODUTOS --}}
                                        <a href="{{route('products-edit',['id' => $product->id_prod])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                          </svg></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div >
                <div class="flex items-center justify-left mt-4">
                <x-primary-button class="ml-3" type="submit" onclick="return alert('Você tem certeza?')">
                    {{ __('Deletar Selecionados') }}
                </x-primary-button>
                </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
