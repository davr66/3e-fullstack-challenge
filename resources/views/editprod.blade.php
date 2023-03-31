@extends('layouts.main')

@section('título', 'Atualizar Produto')

@section('conteudo')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 ">
                    {{ __('Atualizar Produto') }}
                </h2>
                <div class="flex items-center justify-center mt-4">
                    <form method="post" action="{{route('products-update',['id' => $products->id_prod])}}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" class="block mt-1 w-full" value="{{$products->name}}" type="name" name="name" />
                        </div>
                        <div>
                            <x-input-label for="weigth" :value="__('Peso')" />
                            <x-text-input id="weigth" class="block mt-1 w-full" value="{{$products->weigth}}" type="name" name="weigth" />
                        </div>
                        <script>
                            $(function() {
                                $('#weigth').maskMoney();
                            });
                            </script>
                        <div>
                            <x-input-label for="bar_code" :value="__('Código de Barras')" />
                            <x-text-input id="bar_code" class="block mt-1 w-full" value="{{$products->bar_code}}" type="name" name="bar_code" />
                        </div>
                        <div>
                            <x-input-label for="value" :value="__('Valor')" />
                            <x-text-input id="value" class="block mt-1 w-full" value="{{$products->value}}" type="name" name="value" />
                        </div>
                        <script>
                            $(function() {
                                $('#value').maskMoney();
                            });
                        </script>

                        <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-3" type="submit">
                            {{ __('Enviar') }}
                        </x-primary-button>
                    </div>
                    </form>
