@extends('layout')

@section('cabecalho')
<h2 class="text-secondary">Editar usuário</h2>
@endsection

@section('conteudo')

<div class="messageResponse alert" role="alert"></div>

<form method="POST" name="formEditarUsuario">
    @csrf
    <div class="form-group">
        <label for="input-nome">Nome</label>
        <input type="text" class="form-control" id="input-nome" name="nome" value={{$usuario->nome}}>
    </div>
    <div class="form-group">
        <label for="input-email">E-mail</label>
        <input type="email" class="form-control" id="input-email" name="email" value={{$usuario->email}}>
    </div>
    <div class="form-group">
        <label for="input-data-nascimento">Data de nascimento</label>
        <input type="date" class="form-control" id="input-data-nascimento" name="data_nascimento" value={{$usuario->data_nascimento}}>
    </div>
    <div class="form-group">
        <label for="input-senha">Senha</label>
        <input type="password" class="form-control" id="input-senha" name="senha" value={{$usuario->senha}}>
    </div>
    <div class="form-group">
        <label for="text-data-criacao">Data de criação</label>
        <p class="card-body"><?= date("d/m/Y", strtotime($usuario->data_criacao)) ?></p>
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="/usuarios" class="btn btn-light">Cancelar</a>

</form>

@endsection
