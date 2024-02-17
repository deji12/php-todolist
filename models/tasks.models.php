<?php

declare(strict_types= 1);

function add_task(object $pdo, string $task) {

    $query = "INSERT INTO todos (task, user_id) VALUES (:task, :user_id);";

    $statement = $pdo->prepare($query);
    $statement->bindParam(":task", $task);
    $statement->bindParam(":user_id", $_SESSION["user_id"]);

    $statement->execute();

}

function get_user_tasks(object $pdo) {

    $query = "SELECT * FROM todos WHERE user_id = :user_id ORDER BY id DESC;";

    $statement = $pdo->prepare($query);
    $statement->bindParam(":user_id", $_SESSION["user_id"]);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

function get_task(object $pdo, int $id){

    $query = "SELECT * FROM todos WHERE id = :id;";

    $statement = $pdo->prepare($query);
    $statement->bindParam(":id", $id);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_task_detail(object $pdo, string $task, $id) {

    $query = "UPDATE todos SET task = :task WHERE id = :id;";

    $statement = $pdo->prepare($query);
    $statement->bindParam(":task", $task);
    $statement->bindParam(":id", $id);
    $statement->execute();

}

function update_task_status(object $pdo, $id, $status) {

    $task = get_task($pdo, intval($id));

    $query = "UPDATE todos SET completed = :status WHERE id = :id;";

    $statement = $pdo->prepare($query);
    $statement->bindParam(":status", $status);
    $statement->bindParam(":id", $id);
    $statement->execute();
    
}

function delete_task(object $pdo, $id) {

    $query = "DELETE FROM todos WHERE id = :id;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":id", $id);

    $statement->execute();
}