<?php
/* Smarty version 4.3.1, created on 2023-05-29 22:51:10
  from 'E:\dev\xampp\htdocs\paw\php_baza\app\views\CalcView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6475103e2401c0_55686733',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07fcae8c54ae7fc43351276cba15d81c250769e6' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\paw\\php_baza\\app\\views\\CalcView.tpl',
      1 => 1684152133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6475103e2401c0_55686733 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14251471296475103e2220a9_10967667', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12059350666475103e222e55_00318329', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'footer'} */
class Block_14251471296475103e2220a9_10967667 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_14251471296475103e2220a9_10967667',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_12059350666475103e222e55_00318329 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12059350666475103e222e55_00318329',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-gem"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Kalkulator</h1>
								<p>A fully responsive site template designed by <a href="https://html5up.net">HTML5 UP</a> and released<br />
								for free under the <a href="https://html5up.net/license">Creative Commons</a> license.</p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#kalkulator">Kalkulator</a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Intro -->
							<article id="intro">
								<h2 class="major">Intro</h2>
								
							</article>
						<!-- Contact -->
							<article id="kalkulator">
								<h2 class="major">Kalkulator</h2>
								<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute#kalkulator">
									<div class="fields">
										<div class="field">
						
											<input type="text" name="kwota" autocomplete="off" placeholder="Kwota kredytu:" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
"/>
										</div>
										<div class="field">
	
											<input type="text" name="oprocentowanie" autocomplete="off" placeholder="Oprocentowanie kredytu (w %):" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oprocentowanie;?>
"/>
							
										</div>
										<div class="field">
										
											<input type="text" name="czas" autocomplete="off" placeholder="Okres kredytowania (w miesiącach):" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->czas;?>
"/>
										
										</div>
										<div class="field">
											<input type="submit" value="Oblicz" class="primary" />
										</div>
									</div>
								</form>

								<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
									<h2>Wystąpiły błędy: </h2>
									<div>
									<ol>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
									<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</ol>
									</div>
								<?php }?>

								<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
								<h4>Informacje: </h4>
								<ol class="inf">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
								<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
								<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</ol>
								<?php }?>

								<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->rata))) {?>
                   					<h2>Wynik:</h2>
                   					<div>
                   					<p>Miesięczna rata: <?php echo $_smarty_tpl->tpl_vars['res']->value->rata;?>
 PLN</p>
                   					<p>Całkowity koszt kredytu: <?php echo $_smarty_tpl->tpl_vars['res']->value->calkowita_platnosc;?>
 PLN</p>
                   					<p>Koszt odsetek: <?php echo $_smarty_tpl->tpl_vars['res']->value->odsetki;?>
 PLN</p>
                   					</div>
               					<?php }?>
							</article>
					</div>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'content'} */
}
