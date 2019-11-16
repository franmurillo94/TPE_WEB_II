{include file="top.tpl"}
{include file="nav_adm.tpl"}
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-lg-8">
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
                    <td><a href='borrarCategoria/{$categoria->id_categoria}'>Borrar</a></td>
                  </tr>
                  {/foreach}
              </tbody>
            </table>
            <h4>{$error}</h4 style="color=red;">
            {include file="form_categoria_adm.tpl"}
        </div>

    </div>
</div>

{include file="footer.tpl"}