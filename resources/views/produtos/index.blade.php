<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Produtos</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#"><strong>Treinamento</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produtos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('produtos.index')}}">Lista de Produto</a>
            <a class="dropdown-item" href="{{route('produtos.create')}}">Cadastrar Produtos</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorias
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('categorias.index')}}">Lista de Categorias</a>
            <a class="dropdown-item" href="{{route('categorias.create')}}">Cadastrar Categorias</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>


  <div class="container">
    <br>
    <div class="card mb-3 mx-auto" style="max-width: 52rem">
      <h5 class="card-header text-white bg-info">Produtos Cadastrados</h5>
      <div class="card-body">
        @if (session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-trash-alt"></i>
            <strong> {{session('message')}}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Valor</th>
              <th scope="col">Qnt</th>
              <th scope="col">Categoria</th>
              <th scope="col" style="width: 20%">Data de Criação</th>
              <th scope="col" style="width: 15%">Ações</th>
            </tr>
          </thead>
          <tbody>

                  @foreach ($prod as $item)
                      <tr>
                      <td>{{$item->nome}}</td>
                      <td>R$ {{number_format($item->valor,2,',','')}}</td>
                      <td>4</td>
                        <td>
                      @foreach($item->categorias as $cat)
                                {{$cat->nome}},
                      @endforeach
                        </td>
                      <td>{{date("d/m/Y",strtotime($item->created_at))}}</td>
                      <td>
                          <a class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                          </a>
                          <a class="btn btn-warning">
                              <i class="far fa-edit"></i>
                          </a>

                      </td>
                      </tr>
                  @endforeach




          </tbody>
        </table>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
