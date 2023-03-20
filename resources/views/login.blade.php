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
            <a class="nav-link" href="{{ route('login') }}">Find Devs @Github</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('usuarios') }}">usuários</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">devs</a>
        </li>
    </ul>
    <br>
    
    <br>
    <div class="container-fluid" >
        <div class="row" style="margin-botton: 10px !important;">
            @foreach($usuarios as $usuario)
                <div class="col-md-3" style="margin-botton: 10px !important;">
                    <div class="card">
                        <div class="card-header" style="background-image: url({{$usuario->image}})">
                            <h5 class="card-title" style="float: left; color: white;">{{$usuario->nome}}</h5>
                            <img  style="width: 20%; border-radius: 100px; float: right;" src="{{$usuario->image}}" alt="">
                        </div>
                        <div class="card-body">
                            
                            <p class="card-text"><strong>Github: </strong> <a href="{{$usuario->github}}"><img style="width: 10%"src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png" alt="" srcset=""></a></p>
                            <p class="card-text"><strong>Email: </strong> {{$usuario->email}}</p>   
                            <a href="#">Mais informações</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
      
        
    </script>

</body>
</html>