{include file="top.tpl"}
{include file="nav.tpl"}

<div class="container-fluid text-center" id="container">
 <form class="form-signin text-center" method="post" action="insertarUsuario">
      <h1 class="h3 mb-3 font-weight-normal">REGISTRO</h1>
      <h5>USUARIO</h5>
      <label for="inputUser" class="sr-only">Nombre de usuario</label>
      <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de usuario" required="" autofocus="">
      <br>
      <h5>CONTRASEÑA</h5>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required="">
      <div class="checkbox mb-3">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">REGISTRARME</button>

    </form>
    </div>
    </div>

    
  {include file="footer.tpl"}