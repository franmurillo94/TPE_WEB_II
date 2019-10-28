<?php
/* Smarty version 3.1.33, created on 2019-10-28 12:59:56
  from 'C:\xampp\htdocs\Electrodomesticos\Web2\templates\form_productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db6d83c562243_96178842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5548a6ff3159cc906dcf4dedae72c5fb76fdff64' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Electrodomesticos\\Web2\\templates\\form_productos.tpl',
      1 => 1572262910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db6d83c562243_96178842 (Smarty_Internal_Template $_smarty_tpl) {
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
