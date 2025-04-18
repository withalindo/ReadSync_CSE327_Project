<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../BackEnd/updateBookCopy.php';
require_once __DIR__ . '/../BackEnd/connectDB.php';

class UpdateBookCopyTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        $this->conn = include __DIR__ . '/../BackEnd/connectDB.php';
        $this->conn->query("
            INSERT INTO books (book_id, book_name, book_isbn, author_id, category_id, number_of_copies, book_price)
            VALUES (2001, 'Biography of Alindo', '9780062569012', 1, 1, 5, 150.00)
        ");
    }

    public function testUpdateBookCopies()
    {
        $updateBook = new updateBookCopy($this->conn);
        $this->assertTrue($updateBook->updateBookCopiesByISBN('9780062569012', 10));
        $result = $this->conn->query("SELECT number_of_copies FROM books WHERE book_isbn = '9780062569012'");
        $row = $result->fetch_assoc();
        $this->assertEquals(10, $row['number_of_copies']);
    }

    protected function tearDown(): void
    {
        $this->conn->query("DELETE FROM books WHERE book_id = 2001");
        $this->conn->close();
    }
}
?>