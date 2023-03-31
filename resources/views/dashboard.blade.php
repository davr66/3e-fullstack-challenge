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
                                    <td scope="col">{{$product->weigth}}</td>
                                    <td scope="col">{{$product->bar_code}}</td>
                                    <td scope="col">{{$product->value}}</td>
                                    @if($product->status)
                                    <td scope="col">Ativo</td>
                                    @else
                                    <td scope="col">Inativo</td>
                                    @endif
                                    <td>
                                        <a href="{{route('products-onOff',['id' => $product->id_prod])}}">On/Off</a>
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
