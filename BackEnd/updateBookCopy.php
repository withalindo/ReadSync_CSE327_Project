<?php
/**
 * @file updateBookCopy.php
 * @brief This file contains the implementation of the updateBookCopy class, which I created to manage book copy updates in the database.
 * 
 * I designed this file to handle operations like checking if a book exists by its ISBN and updating the number of copies for a book.
 * It also processes POST requests to update book copies and redirects users to the appropriate page after the operation.
 * 
 * @author withaindo
 * @date April 17, 2025
 */

include "../BackEnd/connectDB.php";

/**
 * @class updateBookCopy
 * @brief This class provides methods to manage book copy updates in the database.
 * 
 * I created this class to interact with the `books` table in the database. It includes methods to check if a book exists
 * and update its copy count using its ISBN.
 */
class updateBookCopy
{
    private $conn; /**< @var $conn The database connection object */

    /**
     * @brief Constructor to initialize the database connection.
     * @param $conn The database connection object.
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * @brief Check if a book exists in the database by its ISBN.
     * 
     * I use this method to verify if a book with the given ISBN exists in the database.
     * 
     * @param string $bookISBN The ISBN of the book.
     * @return bool True if the book exists, false otherwise.
     */
    public function bookExistsByISBN($bookISBN)
    {
        $query = "SELECT * FROM books WHERE book_isbn = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $bookISBN);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result && $result->num_rows > 0;
    }

    /**
     * @brief Update the number of copies of a book in the database by ISBN.
     * 
     * I use this method to update the `number_of_copies` field for a book with the given ISBN.
     * 
     * @param string $bookISBN The ISBN of the book.
     * @param int $newCopies The new number of copies.
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateBookCopiesByISBN($bookISBN, $newCopies)
    {
        $query = "UPDATE books SET number_of_copies = ? WHERE book_isbn = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $newCopies, $bookISBN);
        return $stmt->execute();
    }

    /**
     * @brief Handle the update book copy request.
     * 
     * This method processes POST requests to update the number of copies of a book. 
     * I validate the input, check if the book exists, and update the copy count if valid.
     * After processing, I redirect the user to the `updateBookCopyF.php` page.
     */
    public function handleUpdateBookCopy()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bookISBN = isset($_POST["book_isbn"]) ? $_POST["book_isbn"] : null;
            $newTotalCopies = isset($_POST["new_book_copies"]) ? $_POST["new_book_copies"] : null;

            if ($bookISBN === null || $newTotalCopies === null) {
                echo "Error: Missing required POST parameters.";
                return;
            }

            if ($this->bookExistsByISBN($bookISBN)) {
                if ($this->updateBookCopiesByISBN($bookISBN, $newTotalCopies)) {
                    echo "Successfully updated Book ISBN: $bookISBN to $newTotalCopies copies.";
                    header("Location: ../FrontEnd/updateBookCopyF.php");
                } else {
                    echo "Update failed.";
                }
            } else {
                echo "Book not found.";
            }
        } else {
            echo "Invalid request method.";
        }
    }
}

/**
 * @brief Usage example for the updateBookCopy class.
 * 
 * I use this section to demonstrate how to create an instance of the updateBookCopy class and handle a book copy update request.
 */
$conn = include "../BackEnd/connectDB.php";
$bookManager = new updateBookCopy($conn);
$bookManager->handleUpdateBookCopy();