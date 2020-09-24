<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
</head>

<script>
$(function() {
    $('form[name="formAdicionarUsuario"]').submit(function(event) {
        event.preventDefault();
    }).validate({
        rules: {
            nome: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            nome: {
                required: "O campo <span>Nome</span> é obrigátório",
            },
            email: {
                required: "O campo <span>Email</span> é obrigátório",
                email: "O campo <u>Email</u> só aceita emails válidos"
            },
            senha: {
                required: "O campo <span>Senha</span> é obrigátório",
                minlength: "A <span>Senha</span> precisa conter pelo menos 8 caracteres"
            }
        },
        errorClass: "text-danger",

        highlight: function(element, errorClass) {
            $(element).fadeOut(function() {
                $(element).fadeIn();
            });
        },
        submitHandler: function(form) {
            $.ajax({
                url: $(form).attr('action'),
                type: "POST",
                data: $(form).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('.messageResponse').empty();
                    if (response.success === true) {
                        $('.messageResponse').append(`<p class="alert-success alert">${response.message}</p>`);
                    } else {
                        $('.messageResponse').append(`<p class="alert-danger alert">${response.message}</p>`);
                    }
                }
            });
        }
    });

    $('form[name="formExcluirUsuario"]').submit(function(event) {
        event.preventDefault();

        if (confirm("Você tem certeza que deseja excluir esse usuário?")) {

            let idUser = $(this).attr('data-id');
            $.ajax({
                url: $(this).attr('action'),
                type: "DELETE",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                }
            });

            $(`tr[data-id=${idUser}]`).remove();
        }


    });

    $('form[name="formEditarUsuario"]').submit(function(event) {
        event.preventDefault();
    }).validate({
        rules: {
            nome: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            nome: {
                required: "O campo <span>Nome</span> é obrigátório",
            },
            email: {
                required: "O campo <span>Email</span> é obrigátório",
                email: "O campo <u>Email</u> só aceita emails válidos"
            },
            senha: {
                required: "O campo <span>Senha</span> é obrigátório",
                minlength: "A <span>Senha</span> precisa conter pelo menos 8 caracteres"
            }
        },
        errorClass: "text-danger",

        highlight: function(element, errorClass) {
            $(element).fadeOut(function() {
                $(element).fadeIn();
            });
        },
        submitHandler: function(form) {
            console.log(form);
            $.ajax({
                url: $(form).attr('action'),
                type: "PUT",
                data: $(form).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('.messageResponse').empty();
                    if (response.success === true) {
                        $('.messageResponse').append(`<p class="alert-success alert">${response.message}</p>`);
                    } else {
                        $('.messageResponse').append(`<p class="alert-danger alert">${response.message}</p>`);
                    }
                }
            });
        }
    });
});
</script>

<body>
    <div class="container-lg">
        <div class="card">
            <h1 class="card-header"><a href="/usuarios" class="text-dark">CRUD Usuários</a></h1>
            <div class="card-header">
                <p>@yield('cabecalho')</p>
            </div>
            <div class="card-body overflow-auto">
                @yield('conteudo')

            </div>
        </div>
    </div>
</body>


</html>
