<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/app.js"></script>
    <script src="js/bootstrap.js"></script>
    <title>Usuários</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="#">Find Devs @Github</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">usuários</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">devs</a>
        </li>
    </ul>
    <br>
    <div class="container-fluid">
        <h4 class="jumbotron">Usuários cadastrados (@foreach ($usuarios as $usuario) @php echo $loop->count @endphp @break @endforeach)</h4>
        <br>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Novo usuário
        </button>

        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/store">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nome</label>
                            <input type="text" class="form-control" name="nome" id="exampleInputPassword1" placeholder="Digite o nome" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Digite a senha" required> 
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tipo de usuário</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="1">Gestão</option>
                                <option value="2">Usuário comum</option>
                            </select>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>


        {{-- MODAL EDITAR --}}

        <div class="modal" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="passwordEdit">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nomeEdit" placeholder="Digite o nome" required>
                    </div>
                    <div class="form-group">
                        <label for="emailEdit">Email</label>
                        <input type="email" class="form-control" name="email" id="emailEdit" aria-describedby="emailHelp" placeholder="Digite o email" required>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button id="editUserSave" data-id=""class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-dark" id="example">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Tipo</td>
                    <td></td>
                </tr>
            </thead>
            @foreach ($usuarios as $usuario) 
            
                <tr>
                    <td> {{ $usuario->id }}</td>
                    <td> {{ $usuario->nome }}</td>
                    <td> {{ $usuario->email }}</td>
                    <td> {{ $usuario->tipo==1 ? 'GESTÃO':'USUÁRIO' }}</td>
                    <td> 
                        <button data-id="{{ $usuario->id }}" class="btn btn-info editUser"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#exampleModalEdit">Editar</i></button>
                        <button data-id="{{ $usuario->id }}" class="btn btn-danger exc"><i class="fa fa-trash-o" aria-hidden="true">Excluir</i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>

        $.ajaxSetup({
        
        });

        $('.exc').click(function(){
            
            var a = confirm('Deseja mesmo excluir este registro?');
            var id = $(this).attr('data-id');
            
            if(a)
            {
                $.ajax({
                    type: "GET",
                    url: '{{ route('delete') }}',
                    data: { id },
                    success: function(response){
                        alert('Cadastro removido.');
                        location.reload();
                    }
                });
            }
        })


        $('.editUser').click(function(){
            
            var id = $(this).attr('data-id');

            $('#nomeEdit').val('');
            $('#emailEdit').val('');
            
            $.ajax({
                type: "GET",
                url: '{{ route('find') }}',
                data: { id },
                success: function(response){
                    result = JSON.parse(response);
                    
                    $('#nomeEdit').val(result.nome);
                    $('#emailEdit').val(result.email);
                    $('#editUserSave').attr("data-id", result.id)
                }
            });
        })

        $('#editUserSave').click(function(){
            
            var id =    $(this).attr('data-id');
            var nome =  $('#nomeEdit').val();
            var email = $('#emailEdit').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '{{ route('update') }}',
                data: { id, nome, email },
                success: function(response){
                    window.location.reload();
                }
            });
        })
    
    </script>
    

</body>
</html>