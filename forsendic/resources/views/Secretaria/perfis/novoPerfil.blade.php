<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Selecionar Perfil</title>
    <x-imports />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link href="{{asset('css/secretaria/style_perfis.css')}}" rel="stylesheet" />
    <style>
      main {
        background-color:linear-gradient(164.92deg, #31508B 31.08%, rgba(72, 88, 210, 0.69) 119.53%);;
        padding: 1rem;
        /* width: 80%; */
      }
      input {
        margin: 15px;
      }
      #legenda {
        color: white;
      }
    </style>
  </head>
  <body>

<div >
  <!-- START HEADER -->
    <div class="page-header text-center">
      <div class="logo-wrapper">
        <img src="{{asset('/images/Logo_clara.png')}}" width="180" />
      </div>
      <div class="ufal-logo">
        <img src="{{asset('/images/Ufal_white.png')}}" width="100" height="100" />
      </div>
      <div class="header-title">
        <h2><strong>Novo perfil</strong></h2>
      </div>
    </div>
    <!-- END HEADER -->


  <div class="caixa">
    <main>
      <!-- FORM DE ADICIONAR AQUI -->
      <form action="{{route('secretaria.criarPerfil')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="personal-image" >
            <label for="photo" > 
                <input type="file" name="photo" id="photo" onchange="previewImagem()"/>
              <figure class="personal-figure">
                <img src="/images/admin.png" class="personal-avatar" alt="avatar">
                <p id="legenda">Alterar imagem</p>
              </figure>
              </label>
        </div>
        <label for="name"></label>

        <input type="text" name="name" class="form-control" placeholder="inserir nome"> <br>
        @error('name')
          <div class="alert alert-danger" role="alert" >
            {{$message}}
          </div>
        @enderror
        
        <div class="d-flex flex-row-reverse">
          <button
          id="addBtn"
          class="botao-acessar btn ms-2 me-2"
          data-bs-toggle="modal"
          data-bs-target="#">
          Criar
        </button>

        </div>
        
      <div class="d-flex justify-content-center m-2">
        <a href="{{route('secretaria.perfil')}}"">
          <i class="fa-solid fa-user"></i> Página de perfis
        </a>

      </form>

      <!-- AQUI EH POSSIVEL VER UM PREVIEW DA IMAGEM NA PARTE DE CRIAR PERFIL -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
        function previewImagem(){
          var imagem = document.querySelector('input[name = photo').files[0];
          var preview = document.querySelector(".personal-avatar");
          var reader = new FileReader();
          reader.onloadend = function(){
              preview.src = reader.result;
          }

          if(imagem){
            reader.readAsDataURL(imagem);
          }
          else{
            preview.src = "";
          }
          
        }
      </script>

      </main>
  </div>

    <footer><strong>Todos os direitos reservados</strong></footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</div>
  </body>
</html>