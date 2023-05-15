{extends file="main.html"}

{block name=footer}{/block}
		
{block name=content}

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
								<form method="post" action="{$conf->action_url}calcCompute#kalkulator">
									<div class="fields">
										<div class="field">
						
											<input type="text" name="kwota" autocomplete="off" placeholder="Kwota kredytu:" value="{$form->kwota}"/>
										</div>
										<div class="field">
	
											<input type="text" name="oprocentowanie" autocomplete="off" placeholder="Oprocentowanie kredytu (w %):" value="{$form->oprocentowanie}"/>
							
										</div>
										<div class="field">
										
											<input type="text" name="czas" autocomplete="off" placeholder="Okres kredytowania (w miesiącach):" value="{$form->czas}"/>
										
										</div>
										<div class="field">
											<input type="submit" value="Oblicz" class="primary" />
										</div>
									</div>
								</form>

								{if $msgs->isError()}
									<h2>Wystąpiły błędy: </h2>
									<div>
									<ol>
									{foreach $msgs->getErrors() as $err}
									{strip}
										<li>{$err}</li>
									{/strip}
									{/foreach}
									</ol>
									</div>
								{/if}

								{if $msgs->isInfo()}
								<h4>Informacje: </h4>
								<ol class="inf">
								{foreach $msgs->getInfos() as $inf}
								{strip}
									<li>{$inf}</li>
								{/strip}
								{/foreach}
								</ol>
								{/if}

								{if isset($res->rata)}
                   					<h2>Wynik:</h2>
                   					<div>
                   					<p>Miesięczna rata: {$res->rata} PLN</p>
                   					<p>Całkowity koszt kredytu: {$res->calkowita_platnosc} PLN</p>
                   					<p>Koszt odsetek: {$res->odsetki} PLN</p>
                   					</div>
               					{/if}
							</article>
					</div>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
			<script src="{$conf->app_url}/assets/js/browser.min.js"></script>
			<script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
			<script src="{$conf->app_url}/assets/js/util.js"></script>
			<script src="{$conf->app_url}/assets/js/main.js"></script>

{/block}
