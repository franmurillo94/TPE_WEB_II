{include file="top.tpl"}
{include file="nav_adm.tpl"}

<div class="container-fluid">
  <div class="row d-flex justify-content-center">
      <div class="col-10 col-lg-8">
          <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Producto</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Precio</th>
                </tr>
              </thead>
              <tbody>
                {foreach from=$lista_productos item=producto}
                  <tr>
                    <td>{$producto->nombre}</td>
                    <td>{$producto->descripcion}</td>
                    <td>{$producto->precio}</td>
                    <td>{$producto->id_categoria}</td>
                    <td><a href='borrar/{$producto->id_producto}'>Borrar</a></td>
                    <td><a href='editar/{$producto->id_producto}'>Editar</a></td>
                    <td scope="col"> <a href="product/{$products->id_product}">Detalle</th>
                    <td> {$producto->id_producto}</td>
                  </tr>
                  {/foreach}
              </tbody>
            </table>
            {include file="form_productos.tpl"}

      </div>


  </div>
</div>



{include file="footer.tpl"}