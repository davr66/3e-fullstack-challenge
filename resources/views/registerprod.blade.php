@extends('layouts.main')

@section('título', 'Cadastro de Alunos')

@section('conteudo')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Cadastro de Produtos') }}
                </h2>
                <div class="flex items-center justify-center mt-4">
                    <form method="post" action="">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name">
                        <br>
                        <label for="weigth">Peso</label>
                        <input type="text" name="weigth" id="weigth">
                        <label for="bar_code">Código de Barras:</label>
                        <input type="text" name="bar_code" id="bar_code">
                        <label for="value">Valor:</label>
                        <input type="text" name="value" id="value">
                    </form>
