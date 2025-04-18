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
        $username = 'JohnDoe';
        $books = [];
        $result = $this->borrowBook($username, $books);
        $this->assertStringContainsString("Please enter a username and select at least one book.", $result);
    }

    public function testValidInput()
    {
        $username = 'JohnDoe';
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
        $username = 'JohnDoe';
        $books = [null, '', 123];
        $result = $this->borrowBook($username, $books);
        $this->assertEquals("Success", $result); // Assuming the function doesn't validate book content
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
