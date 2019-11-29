

<div class="container-fluid">

 <div class="row d-flex justify-content-center">
    <div class="col-10 col-lg-8">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Imagen</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>{$producto->nombre}</td>
              <td>{$producto->descripcion}</td>
              <td>{$producto->precio}</td> 
              <td><img src='{$img->src}'  height="150px" width="150px">
              </td>
            </tr>
        </tbody>
      </table>
    
    </div>
  </div>
 
 
 <div class="row d-flex justify-content-center" id="app">


  <div class="col-6 align-self-center">
  <form class="form-signin text-center" >
    <div class="form-group">
      <label for="exampleFormControlSelect1">Puntaje</label>
      <select class="form-control" v-model="comentario.puntaje" id="exampleFormControlSelect1" required>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="coment" >Comentario</label>
      <textarea class="form-control" id="coment" v-model="comentario.comentario" rows="3" required></textarea>
    </div>
    <input type="text" id="idusuario" class="form-control d-none"  v-model="comentario.idUsr = {$usuario->id_usuario}">
    <input type="text" id="idcomentario" class="form-control d-none" v-model="comentario.idProducto = {$producto->id_producto}">
  </form>
    
 {if $usuario eq null}
    <h2>Loguearse para poder comentar</h2>
  {elseif $usuario->admin eq 0}
    <h2>Aca van las opciones de borrar y demas</h2>
  {else}    
    <button  class="btn btn-primary" @click="postComentario" value="">Comentar</button>
  {/if}   
  </div>
</div>

</div>

{include file="footer.tpl"}