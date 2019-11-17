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
                    <td><a href='MostrarEditar/{$producto->id_producto}'>Editar</a></td>
                    {foreach from=$lista_img item=img}
                    <td>
                      {if $img->id_producto eq $producto->id_producto}
                      <img src='{$img->src}'  height="150px" width="150px">
                      <a href='borrarimagen/{$img->id_img}'>Borrar</a>
                      {/if}
                    </td>
                    {/foreach}
                  </tr>
                  {/foreach}
              </tbody>
            </table>
            {include file="form_productos.tpl"}

      </div>


  </div>
</div>



{include file="footer.tpl"}