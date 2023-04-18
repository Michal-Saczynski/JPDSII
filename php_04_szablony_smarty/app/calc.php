<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/smarty/libs/Smarty.class.php';

function getParams(&$form){
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['oprocentowanie'] = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
	$form['czas'] = isset($_REQUEST['czas']) ? $_REQUEST['czas'] : null;	
}

function validate(&$form, &$messages){

	if ( ! (isset ($form['kwota']) && isset($form['oprocentowanie']) && isset($form['czas']))) {
		return false;
	}
	if ( $form['kwota'] == "") {
		$messages [] = 'Nie podano kwoty kredytu';
	}
	if ( $form['oprocentowanie'] == "") {
		$messages [] = 'Nie podano oprocentowania';
	}
	if ( $form['czas'] == "") {
		$messages [] = 'Nie podano okresu kredytowania';
	}


	if (empty( $messages )) {

		if (! is_numeric( $form['kwota'] )) {
			$messages [] = 'Kwota kredytu nie jest liczbą';
		}
		
		if (! is_numeric( $form['oprocentowanie'] )) {
			$messages [] = 'Oprocentowanie nie jest liczbą';
		}
		
		if (! is_numeric( $form['czas'] )) {
			$messages [] = 'Okres kredytowania nie jest liczbą';
		}	

		if(count($messages) != 0) return false;
		else return true;
	}
}

function process(&$form,&$miesieczne_oprocentowanie,&$rata,&$calkowita_platnosc,&$odsetki){
$form['kwota'] = intval($form['kwota']);
	$form['oprocentowanie'] = intval($form['oprocentowanie']);

	$miesieczne_oprocentowanie = $form['oprocentowanie'] / 100 / 12;
	$rata = round($form['kwota'] * $miesieczne_oprocentowanie / (1 - pow(1 + $miesieczne_oprocentowanie, -$form['czas'])),2);
	$calkowita_platnosc = $rata * $form['czas'];
	$odsetki = round($calkowita_platnosc - $form['kwota'],2);
}
$form = null;
$miesieczne_oprocentowanie = null;
$rata = null;
$calkowita_platnosc = null;
$odsetki = null;
$messages = array();

getParams($form);
if(validate($form, $messages)) {
	process($form, $miesieczne_oprocentowanie,$rata,$odsetki,$calkowita_platnosc);
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','"Profesjonalne" szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty zastosowane w kalkulatorze');

$smarty->assign('form',$form);
$smarty->assign('miesieczne_oprocentowanie',$miesieczne_oprocentowanie);
$smarty->assign('rata',$rata);
$smarty->assign('calkowita_platnosc',$calkowita_platnosc);
$smarty->assign('odsetki',$odsetki);
$smarty->assign('messages',$messages);

$smarty->display(_ROOT_PATH.'/app/index.html');