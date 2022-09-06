<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Usuários</title>
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

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    
                </tr>
            </thead>
            @foreach ($usuarios as $usuario) 
            
                <tr>
                    <td> {{ $usuario->id }}</td>
                    <td> {{ $usuario->nome }}</td>
                    <td> {{ $usuario->email }}</td>
                    <td> {{ $usuario->tipo==1 ? 'GESTÃO':'USUÁRIO' }}</td>
                    <td> 
                    <a href="/produtos/mostra">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>