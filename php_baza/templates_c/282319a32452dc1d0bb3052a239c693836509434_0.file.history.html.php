<?php
/* Smarty version 4.3.1, created on 2023-05-29 23:20:03
  from 'C:\xampp\htdocs\php_baza\app\views\history.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64751703cf04f8_21961614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '282319a32452dc1d0bb3052a239c693836509434' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_baza\\app\\views\\history.html',
      1 => 1685394884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64751703cf04f8_21961614 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Kwota</th>
            <th>oprocentowanie</th>
            <th>Czas</th>
            <th>Rata</th>
            <!-- <?php if (inRole('admin')) {?>
                <th>Opcje</th>
            <?php }?> -->
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['record']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["kwota"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["oprocentowanie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["czas"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["rata"];?>
</td><!-- <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
wynikDelete&id=<?php echo $_smarty_tpl->tpl_vars['r']->value['idwynik'];?>
">Usuń</a></td> --></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
    </table><?php }
}
