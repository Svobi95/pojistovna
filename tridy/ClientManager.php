<?php
require('Client.php');

class ClientManager
{
    /**
     * Určuje, zda při odesílání formuláře došlo k chybě
     * @var bool
     */
    private bool $error;

    function __construct()
    {
        $this->error = false;
    }

    /**
     * Provede dotaz do databáze na všechny klienty
     * @return array
     */
    private function selectAll()
    {
        $result = Database::query('
        SELECT *
        FROM `client`
        ');
        $data = $result->fetchAll();
        return $data;
    }

    /**
     * Načte všechny klienty z databáze
     * @return array
     */
    public function getAllClients(): array
    {
        return $this->selectAll();
    }


    /**
     * Vloží data z formuláře do databáze zkontroluje, zda jsou všechna pole plná a jestli telefonní číslo je ve správném formátu
     * @return void
     */
    public function insertClient()
    {
        $this->error = false;
        if ($_POST) {
            $first_name = $_POST['first_name'];
            $second_name = $_POST['second_name'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];

            $newClient = new Client($first_name, $second_name, $age, $phone);

            // Pokud jsou data v pořádku, vytvoří se nový klient v databázi, pokud ne, zobrazí se error
            if ($newClient->validate()) {
                $newClient->insertToDb();

                // po odeslání se stránka přesměruje sama na sebe, aby se znovu neodesílala při refresh
                header('Location:index.php');
            } else {
                $this->error = true;
            }
        }
    }

    /**
     * Vrací, zda při odesílání formuláře došlo k chybě
     * @return bool
     */
    public function isInErrorState(): bool
    {
        return $this->error;
    }
}
?>