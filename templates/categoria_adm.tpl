{include file="top.tpl"}
{include file="nav_adm.tpl"}
<div class="container-fluid">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">categoria</th>
      <th scope="col">Descripcion</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$lista_categoria item=categoria}
      <tr>
        <td>{$categoria->nombre}</td>
        <td>{$categoria->descripcion}</td>
      </tr>
      {/foreach}
  </tbody>
</table>
{include file="form_categoria_adm.tpl"}
</div>

{include file="footer.tpl"}