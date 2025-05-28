<?php
class Book {
    private $code_book;
    private $name;
    private $qty;

    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }

    // Private setter for code_book with validation
    private function setCodeBook($code_book) {
        if (!preg_match('/^[A-Z]{2}\d{2}$/', $code_book)) {
            throw new InvalidArgumentException("Kode buku harus berupa 2 huruf besar diikuti 2 angka (contoh: BB00)");
        }
        $this->code_book = $code_book;
    }

    // Private setter for qty with validation
    private function setQty($qty) {
        if (!is_int($qty) || $qty <= 0) {
            throw new InvalidArgumentException("Quantity harus bilangan integer positif");
        }
        $this->qty = $qty;
    }

    // Public getters
    public function getCodeBook() {
        return $this->code_book;
    }

    public function getName() {
        return $this->name;
    }

    public function getQty() {
        return $this->qty;
    }
}
?>