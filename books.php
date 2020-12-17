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

function authors_get($link, $surname) {
    $query = "SELECT * FROM authors WHERE surname LIKE '%" . $surname .  "%'";

    $result = mysqli_query($link, $query);

    if (!$result){
        $surname = null;
    } else {
        $surname = mysqli_fetch_assoc($result);
    }
    return $surname;
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



