<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/smarty/libs/Smarty.class.php';
require_once $conf->root_path.'/smarty/libs/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

/** Kontroler kalkulatora
 * @author Przemysław Kudłacik
 *
 */
class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $miesieczne_oprocentowanie;
	private $rata;
	private $calkowita_platnosc;
	private $odsetki;

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->miesieczne_oprocentowanie = new CalcResult();
		$this->rata = new CalcResult();
		$this->calkowita_platnosc = new CalcResult();
		$this->odsetki = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
		$this->form->oprocentowanie = isset($_REQUEST ['oprocentowanie']) ? $_REQUEST ['oprocentowanie'] : null;
		$this->form->czas = isset($_REQUEST ['czas']) ? $_REQUEST ['czas'] : null;
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->oprocentowanie ) && isset ( $this->form->czas ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == "") {
			$this->msgs->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->oprocentowanie == "") {
			$this->msgs->addError('Nie podano oprocentowania');
		}
		
		if ($this->form->czas == "") {
			$this->msgs->addError('Nie podano okresu kredytowania');
		}
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				$this->msgs->addError('Kwota kredytu nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->oprocentowanie )) {
				$this->msgs->addError('Oprocentowanie nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->czas )) {
				$this->msgs->addError('Okres kredytowania nie jest liczbą');
			}
		}
		
		return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
			
				
			//konwersja parametrów na int
			$this->form->kwota = intval($this->form->kwota);
			$this->form->oprocentowanie = intval($this->form->oprocentowanie);
			$this->form->czas = intval($this->form->czas);
			$this->msgs->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			
					
					$this->miesieczne_oprocentowanie->miesieczne_oprocentowanie = $this->form->kwota / 100 / 12;
					$this->rata->rata = round($this->form->kwota * $this->miesieczne_oprocentowanie->miesieczne_oprocentowanie / (1 - pow(1 + $this->miesieczne_oprocentowanie->miesieczne_oprocentowanie, -$this->form->czas)),2);
					$this->calkowita_platnosc->calkowita_platnosc = $this->rata->rata * $this->form->czas;
					$this->odsetki->odsetki = round($this->calkowita_platnosc->calkowita_platnosc - $this->form->kwota ,2);
					$this->msgs->addInfo('Wykonano obliczenia.');

			}
			
		
		
		$this->generateView();
	}
	
	
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		

$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','"Profesjonalne" szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty zastosowane w kalkulatorze');
				
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		$smarty->assign('miesieczne_oprocentowanie',$this->miesieczne_oprocentowanie);
		$smarty->assign('rata',$this->rata);
		$smarty->assign('calkowita_platnosc',$this->calkowita_platnosc);
		$smarty->assign('odsetki',$this->odsetki);

		$smarty->display($conf->root_path.'/app/CalcView.html');


		
		
	}
}
