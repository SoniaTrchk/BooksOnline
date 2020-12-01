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



