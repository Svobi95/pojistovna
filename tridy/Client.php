<?php

class Client
{
    protected string $first_name;
    protected string $second_name;
    protected int $age;
    protected string $phone;

    function __construct($first_name, $second_name, $age, $phone)
    {

        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->age = $age;
        $this->phone = $this->formatPhoneNumber($phone);
    }

    /**
     * Zformátuje telefonní číslo do formátu XXX XXX XXX
     * @param string $number
     * @return string
     */
    private function formatPhoneNumber($number)
    {
        // Odstraní kód země (+420) a mezery
        $cleanedPhone = preg_replace('/^\+420\s?/', '', $number);

        // Odstraní všechny znaky, které nejsou číslice
        $cleanedPhone = preg_replace('/\D/', '', $cleanedPhone);

        // Formátuje číslo na XXX XXX XXX
        return preg_replace('/(\d{3})(\d{3})(\d{3})/', '$1 $2 $3', $cleanedPhone);
    }


    /**
     * Provede dotaz do databáze pro vložení nového klienta
     * @return void
     */
    public function insertToDb()
    {
        Database::query('
            INSERT INTO `client`
            (`first_name`, `second_name`, `age`, `phone`)
            VALUES (?, ?, ?, ?)
        ', array($this->first_name, $this->second_name, $this->age, $this->phone));
    }

    /**
     * Validates client data
     * @return bool
     */
    public function validate()
    {
        if (
            isset($this->first_name) && $this->first_name && isset($this->second_name) && $this->second_name && isset($this->age) && $this->age && isset($this->phone) && $this->phone && preg_match('/^(?:\+420)? ?[0-9]{3} ?[0-9]{3} ?[0-9]{3}$/', $this->phone)
        ) {
            return true;
        } else {
            return false;
        }
    }

}
