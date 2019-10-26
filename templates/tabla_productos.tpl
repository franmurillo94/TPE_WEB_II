{include file="top.tpl"}
{include file="nav.tpl"}

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
        <td><a href='borrar/{$producto->id_producto}'>Borrar</a></td>
        <td><a href='editar/{$producto->id_producto}'>Editar</a></td>
        <td> {$producto->id_producto}</td>
      </tr>
      {/foreach}
  </tbody>
</table>


{include file="form_productos.tpl"}

{include file="footer.tpl"}