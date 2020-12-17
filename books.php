<?php
function books_all($link){
    $query = "SELECT * FROM books ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die (mysqli_error($link));

    $n = mysqli_num_rows($result);
    $books = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $books[] = $row;
    }

    return $books;
}
function authors_all($link){
    $query = "SELECT * FROM authors ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die (mysqli_error($link));

    $n = mysqli_num_rows($result);
    $authors = array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $authors[] = $row;
    }

    return $authors;
}

function get_authors ($link, $id){
    $query = "SELECT * FROM authors WHERE id LIKE '%"  .$id. "%'";

    $result = mysqli_query($link, $query);

    if (!$result){
        $author = null;
    } else {
        $author = mysqli_fetch_assoc($result);
    }

    return $author;

}

function books_get($link, $name) {
    $query = "SELECT * FROM books WHERE name_ LIKE '%" . $name .  "%'";

    $result = mysqli_query($link, $query);

    if (!$result){
        $books = null;
    } else {
        $books = mysqli_fetch_assoc($result);
    }
    return $books;
}

function authors_get($link, $name, $surname) {
    $query = "SELECT * FROM authors WHERE surname LIKE '%" . $surname .  "%' AND name_ LIKE '%" . $name .  "%'";

    $result = mysqli_query($link, $query);

    if (!$result){
        $author = null;
    } else {
        $author = mysqli_fetch_assoc($result);
    }
    return $author;
}

function articles_get($link, $name_) {
    $query = "SELECT * FROM books WHERE name_ LIKE '%" . $name_ .  "%'";

    $result = mysqli_query($link, $query);

    if (!$result){
        $articles = null;
    } else {
        $articles = mysqli_fetch_assoc($result);
    }
    return $articles;
}

function books_new($link, $name_, $genre) {
    $name_ = trim($name_);
    $genre = trim($genre);


    if ($name_ == "") {
        return false;
    }

    $g = "INSERT INTO books (name_,genre) VALUES ('%s','%s')";

    $query = sprintf($g, mysqli_real_escape_string($link, $name_), mysqli_real_escape_string($link, $genre));

    $result = mysqli_query($link, $query);

    if(!$result) {
        die (mysqli_error($link));
    }

    return true;
}

function writing_new($link, $id_book, $id_author) {
    $id_book = trim($id_book);
    $id_author = trim($id_author);


    if ($id_book == "" || $id_author == "") {
        return false;
    }

    $g = "INSERT INTO writing (id_book,id_author) VALUES ('%s','%s')";

    $query = sprintf($g, mysqli_real_escape_string($link, $id_book), mysqli_real_escape_string($link, $id_author));

    $result = mysqli_query($link, $query);

    if(!$result) {
        die (mysqli_error($link));
    }

    return true;
}

function authors_new($link, $name_, $surname) {
    $name_ = trim($name_);
    $surname = trim($surname);


    if ($name_ == "" || $surname == "") {
        return false;
    }

    $g = "INSERT INTO authors (name_,surname) VALUES ('%s','%s')";

    $query = sprintf($g, mysqli_real_escape_string($link, $name_), mysqli_real_escape_string($link, $surname));

    $result = mysqli_query($link, $query);

    if(!$result) {
        die (mysqli_error($link));
    }

    return true;
}
 function get_writing($link, $id){
     $query = "SELECT * FROM writing WHERE id_book LIKE '%"  . $id .  "%'";

     $result = mysqli_query($link, $query);

     if (!$result){
         $writing = null;
     } else {
         $writing = mysqli_fetch_assoc($result);
     }
     return $writing;
 }


