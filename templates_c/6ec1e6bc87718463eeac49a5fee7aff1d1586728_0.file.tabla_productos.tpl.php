<?php
/* Smarty version 3.1.33, created on 2019-10-22 23:38:21
  from 'C:\xampp\htdocs\proyectos\Web\templates\tabla_productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5daf76cd636d86_31954618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ec1e6bc87718463eeac49a5fee7aff1d1586728' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web\\templates\\tabla_productos.tpl',
      1 => 1571780298,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:top.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:form_productos.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5daf76cd636d86_31954618 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista_productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
      
      
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->descripcion;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</td>
        <td><a href='borrar/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
'>Borrar</a></td>
        <td><a href='editar/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
'>Editar</a></td>
        <td> <?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
</td>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tbody>
</table>


<?php $_smarty_tpl->_subTemplateRender("file:form_productos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
