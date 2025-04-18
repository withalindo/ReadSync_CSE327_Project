<?php

use PHPUnit\Framework\TestCase;

class BorrowBookTest extends TestCase
{
    public function testUserNameIsEmpty()
    {
        $username = '';
        $books = ['Book1', 'Book2'];
        $result = $this->borrowBook($username, $books);
        $this->assertStringContainsString("Please enter a username and select at least one book.", $result);
    }

    public function testBooksArrayIsEmpty()
    {
        $username = 'Karma';
        $books = [];
        $result = $this->borrowBook($username, $books);
        $this->assertStringContainsString("Please enter a username and select at least one book.", $result);
    }

    public function testValidInput()
    {
        $username = 'Karma';
        $books = ['Book1', 'Book2'];
        $result = $this->borrowBook($username, $books);
        $this->assertEquals("Success", $result);
    }

    public function testBothInputsEmpty()
    {
        $username = '';
        $books = [];
        $result = $this->borrowBook($username, $books);
        $this->assertStringContainsString("Please enter a username and select at least one book.", $result);
    }

    public function testBooksArrayContainsInvalidData()
    {
        $username = 'Karma';
        $books = [null, '', 123];
        $result = $this->borrowBook($username, $books);
        $this->assertEquals("Success", $result);
    }

    private function borrowBook($username, $books)
    {
        if (empty($username) || empty($books)) {
            return "Please enter a username and select at least one book.";
        }
        return "Success";
    }
}

?>
