@extends('layout')

@section('title', 'Usuários')

@section('cabecalho')
Listar
@endsection

@section('conteudo')

<a href="/usuarios/adicionar" class="btn btn-primary float-right">Adicionar usuário</a>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Data de Criação</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php foreach ($usuarios as $key => $usuario){ ?>
        <tr>
            <th scope="row"><?= $key+1?></th>
            <td><?=$usuario->nome?> </td>
            <td><?=$usuario->email?> </td>
            <td><?= $usuario->data_nascimento?></td>
            <td><?=$usuario->data_criacao?></td>

            <td class="btn-group">
                <form method="GET" action="/usuarios/editar/{{$usuario->id}}" name="formSelecionarEditarUsuario">
                    @csrf
                    <input type="hidden" name="id" value={{$usuario->id}}></input>
                    <button type="submit" class="btn btn-info">Editar</button>
                </form>
                <form method="POST" action="/usuarios/remover/{{$usuario->id}}" name="formExcluirUsuario">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value={{$usuario->id}}></input>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
            </th>
        </tr>
        <?php }?>
        </tr>
    </tbody>
</table>
</div>


@endsection