{include file="top.tpl"}
{include file="nav.tpl"}

<div class="container-fluid text-center" id="container">
    <h1 class="h3 mb-3 font-weight-normal">INICIAR SESION</h1>
    <form class="form-signin text-center" method="post" action="iniciarSesion">
        <h5>USUARIO</h5>
        <label for="inputUser" class="sr-only">Nombre de usuario</label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de usuario" required="" autofocus="">
        <p></p>
        <h5>CONTRASEÑA</h5>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required="">
        <button class="btn btn-lg btn-primary btn-block"  value="Login">INICIAR SESION</button>
    </form>
</div>

  {include file="footer.tpl"}