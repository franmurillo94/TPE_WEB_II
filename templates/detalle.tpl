{include file="top.tpl"}
{include file="nav.tpl"}

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
<form class="form-signin text-center">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Puntaje</label>
    <select class="form-control" v-model="comentario.puntaje" id="exampleFormControlSelect1">
      <option >1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="coment" >Comentario</label>
    <textarea class="form-control" id="coment" v-model="comentario.comentario"rows="3"></textarea>
  </div>
</form>

  <button  class="btn btn-primary" @click="comentar" value="">Comentar</button>
</div>
</div>

</div>

{include file="footer.tpl"}