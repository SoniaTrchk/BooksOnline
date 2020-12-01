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
function books_get($link, $id_books) {
    $query = sprintf("SELECT * FROM books WHERE id=%d", (int)$id_books);

    $result = mysqli_query($link, $query);

    if (!$result) die (mysqli_error($link));

    $books = mysqli_fetch_assoc($result);

    return $books;
}
function books_new($link, $name_, $genre) {
    $name_ = trim($name_);
    $genre = trim($genre);

    if ($name_ == "") {
        return false;
    }

    $g = "INSERT INTO books (name_,genre) VALUES (%s','%s')";

    $query = sprintf($g, mysqli_real_escape_string($link, $name_), mysqli_real_escape_string($link, $genre));

    $result = mysqli_query($link, $query);

    if(!$result) {
        die (mysqli_error($link));
    }

    return true;
}
function books_edit($link, $id, $name_, $genre) {
    $name_ = trim($name_);
    $genre= trim($genre);


    $id = (int)$id;

    if($name_ == '') {
        return false;
    }

    $sql = "UPDATE books SET name_='%s', genre='%s', WHERE id='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $name_), mysqli_real_escape_string($link, $genre), $id);

    $result = mysqli_query($link, $query);

    if (!$result) {
        die(mysqli_error($link));
    }

    return mysqli_affected_rows($link);
}

function books_delete($link, $id) {
    $id = (int)$id;

    if($id == 0) {
        return false;
    }

    $query = sprintf("DELETE FROM books WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result) {
        die(mysqli_error($link));
    }

    return mysqli_affected_rows($link);
}
?>