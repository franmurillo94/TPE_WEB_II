{include file="top.tpl"}
{include file="nav.tpl"}

<div class="container-fluid">
 <div class="row d-flex justify-content-center">
      <div class="col-10 col-lg-8">
                  
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Detalle</th>
              </tr>
            </thead>
            <tbody>
              {foreach from=$lista_productos item=producto}
                <tr>
                  <td>{$producto->nombre}</td>
                  <td scope="col"> <a href="detalle/{$producto->id_producto}">Detalle</th>
                </tr>
                {/foreach}
            </tbody>
          </table>

      </div>


  </div>

</div>

{include file="footer.tpl"}