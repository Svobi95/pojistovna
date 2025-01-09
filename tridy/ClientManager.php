<?php
class clientManager{   
    // VLOŽENÍ DO DATABÁZE:

    /**
     * Method insertClient - vloží data z formuláře do databáze
     *  podmínka zkontroluje, zda jsou všechna pole plná a jestli telefonní číslo je telefonní číslo 
     *  nejspíš má být kontrola a vložení každý na jiném místě, ale to nevím jak udělat...
     * 
     *

     * @return void
     */
    public function insertClient(){
        if ($_POST) {
            if (isset($_POST['first_name'])&& $_POST['first_name'] && isset($_POST['second_name'])&& $_POST['second_name']
            && isset($_POST['age'])&& $_POST['age'] && isset($_POST['phone'])&& $_POST['phone'] && preg_match('/^\+420\s?\d{3}\s?\d{3}\s?\d{3}$/', $_POST['phone']))   { 
            $first_name=$_POST['first_name'];
            $second_name=$_POST['second_name'];
            $age=$_POST['age'];
            $phone=$_POST['phone'];

            Database::query('
            INSERT INTO `client`
            (`first_name`, `second_name`, `age`, `phone`)
            VALUES (?, ?, ?, ?)
        ', array($first_name, $second_name, $age, $phone));
        // po odeslání se stránka přesměruje sama na sebe, aby se znovu neodesílala při refresh
            header('Location:index.php');
        } 
        else echo '';
        }

    }

    // VÝBĚR Z DATABÁZE:

    /**
     * @return [type]
     */
    private function selectAll(){
        $result = Database::query('
        SELECT *
        FROM `client`
        ');
        $data = $result->fetchAll();
        return $data;   
    }

    // VÝPIS DO STRÁNKY
    /**
     * Method listAllClients vypíše všechny klienty do tabulky
     *
     * @return void
     */
    public function listAllClients():void{
       $clients= $this->selectAll();

       foreach($clients as $client){
		echo '<tr>';
		echo '<td>' . htmlspecialchars($client['client_id']) .'</td><td>' . htmlspecialchars($client['first_name']).' '.htmlspecialchars($client['second_name']). '</td> <td>'. htmlspecialchars($client['age']) . '</td><td>' . htmlspecialchars($client['phone']) .'</td>';
		echo '</tr>';
	}
    }


    // tady jsem se ještě snažil nachystat zformátování telefonního čísla aby mělo stejný tvar jako v zadání
    // ale zatím vůbec nevím, jak to použít
    function formatPhoneNumber($number) {
		// odebere prázdné znaky
		$cleanedNumber = preg_replace('/\s+/', '', $number); 
		// mezi trojice znaků vloží mezeru
		$formattedNumber = preg_replace('/(\+\d{3})(\d{3})(\d{3})(\d{3})/', '$1 $2 $3 $4', $cleanedNumber);
		// zkrátí číslo na posledních 9 čísel
		$cuttedNumber = substr($formattedNumber, -11);
		
		return $cuttedNumber;
	}
    

}
?>