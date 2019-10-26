<?php
/* Smarty version 3.1.33, created on 2019-10-22 20:59:30
  from 'C:\xampp\htdocs\proyectos\Web\templates\form_productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5daf51925c7f04_63684176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc533d925096f6a5d1fbbf8055fa4048f5602b8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web\\templates\\form_productos.tpl',
      1 => 1571762906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5daf51925c7f04_63684176 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="insertar" method="post">
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
  <input type="submit" class="btn btn-primary" value="insertar">
</form><?php }
}
