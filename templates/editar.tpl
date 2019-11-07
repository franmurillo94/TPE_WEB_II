{include file="top.tpl"}
{include file="nav.tpl"}
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
<form action="editar/{$producto->id_producto}" method="post">
  <div class="form-group">
    <label for="nombre">Nombre producto:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter nombre del producto">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion producto:</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Enter descripcion del producto">
  </div>
  <div class="form-group">
    <label for="precio">Precio producto:</label>
    <input type="number" class="form-control" id="precio" name="precio" placeholder="Enter precio del producto">
  </div>
  <div class="form-group">
    <label for="categoria">Categoria producto:</label>  
    <select id="id_categoria" name ="categoria" class="browser-default custom-select">
              {foreach from=$lista_categorias item=categoria}
                <option value="{$categoria->id_categoria}">{$categoria->nombre}</option>          
              {/foreach}
    </select>
  </div><p></p>
  <div class="custom-file">
  <input type="file" class="custom-file-input" id="imagenes" name="imagenes" >
  <label class="custom-file-label" for="customFileLang"    >Seleccionar Archivo</label>
</div>
  <input type="submit" class="btn btn-primary" value="editar">
</form>
  </div>


  </div>

{include file="footer.tpl"}