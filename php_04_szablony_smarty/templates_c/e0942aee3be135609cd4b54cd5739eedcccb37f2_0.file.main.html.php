<?php
/* Smarty version 4.3.1, created on 2023-04-18 02:46:31
  from 'E:\dev\xampp\htdocs\paw\michu\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_643de8670d13e7_45413426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0942aee3be135609cd4b54cd5739eedcccb37f2' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\paw\\michu\\templates\\main.html',
      1 => 1681778701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_643de8670d13e7_45413426 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>

<!-- 
	Astral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
     -->

<html>
	<head>
		<title>Dimension by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2977338643de8670ca3f2_95055747', 'header');
?>

<!-- <nav id="nav">
    <div class="splash-container">
        <div class="splash">
            <h2 class="splash-head"><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h2>
            <p class="splash-subhead"></p>
        </div>
    </div>
</nav> -->

<div class="content-wrapper">
    
    <div id="app_content" class="content">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_721867074643de8670d0762_51230451', 'content');
?>

    </div>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_877512643643de8670d0ea4_04510737', 'footer');
?>

    <footer id="footer">
		<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
	</footer>
</div>

</body>
</html><?php }
/* {block 'header'} */
class Block_2977338643de8670ca3f2_95055747 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_2977338643de8670ca3f2_95055747',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'content'} */
class Block_721867074643de8670d0762_51230451 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_721867074643de8670d0762_51230451',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_877512643643de8670d0ea4_04510737 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_877512643643de8670d0ea4_04510737',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
}
