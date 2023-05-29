<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

namespace app\controllers;
use app\forms\CalcForm;
use app\transfer\CalcResult;
use PDOException;

class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $miesieczne_oprocentowanie;
	private $rata;
	private $records;
	private $calkowita_platnosc;
	private $odsetki;

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->kwota = getFromRequest('kwota');
		$this->form->oprocentowanie = getFromRequest('oprocentowanie');
		$this->form->czas = getFromRequest('czas');
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
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->oprocentowanie == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		if ($this->form->czas == "") {
			getMessages()->addError('Nie podano okresu kredytowania');
		}
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				getMessages()->addError('Kwota kredytu nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->oprocentowanie )) {
				getMessages()->addError('Oprocentowanie nie jest liczbą');
			}
			
			if (! is_numeric ( $this->form->czas )) {
				getMessages()->addError('Okres kredytowania nie jest liczbą');
			}
		}
		
		return ! getMessages()->isError();
	}
	    public function validateEdit() {
            $this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
            return ! getMessages()->isError();
        }
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getparams();
		
		if ($this->validate()) {

			//konwersja parametrów na int
			$this->form->kwota = intval($this->form->kwota);
			$this->form->oprocentowanie = intval($this->form->oprocentowanie);
			$this->form->czas = intval($this->form->czas);
			getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
					$this->miesieczne_oprocentowanie = $this->form->kwota / 100 / 12;
					$this->rata = round($this->form->kwota * $this->miesieczne_oprocentowanie / (1 - pow(1 + $this->miesieczne_oprocentowanie, -$this->form->czas)),2);
					$this->calkowita_platnosc = $this->rata * $this->form->czas;
					$this->odsetki = round($this->calkowita_platnosc - $this->form->kwota ,2);
					getMessages()->addInfo('Wykonano obliczenia.');
			}

		$this->action_wynikSave();
		
	}
	
	 public function action_wynikSave(){
			
		if ($this->validate()) {
			try {
				getDB()->insert("wynik", [
					"kwota" => $this->form->kwota,
					"oprocentowanie" => $this->form->oprocentowanie,
					"czas" => $this->form->czas,
					"rata" => $this->rata
				]);
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			$this->action_WynikList();

		} else {
			$this->action_WynikList();
		}		
	}
    public function action_wynikDelete(){		
		if ( $this->validateEdit() ){
			try{
				getDB()->delete("wynik",[
					"idwynik" => $this->form->id
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		forwardTo('calcShow');		
	}
	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->action_WynikList();
	}
    public function action_WynikList(){
		try{
			$this->records = getDB()->select("wynik", [
					"idwynik",
					"kwota",
					"oprocentowanie",
					"czas",
					"rata",
				],);
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}	
		$this->generateView();
	
	}
		
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		
	
		getSmarty()->assign('user',unserialize($_SESSION['user']));
				
		getSmarty()->assign('page_title','Super kalkulator - role');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		getSmarty()->assign('rata',$this->rata);
		getSmarty()->assign('cal_platnosc',$this->calkowita_platnosc);
		getSmarty()->assign('odsetki',$this->odsetki);
		getSmarty()->assign('record',$this->records);
		
		getSmarty()->display('CalcView.html');
	}


		
		
	}
