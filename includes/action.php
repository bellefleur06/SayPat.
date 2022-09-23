<?php include 'config.php';

// Send Message

if (isset($_POST['send'])){
    $message =  $_POST['message'];

    if ($message == '') {

        $_SESSION['required'] = "Message Is Required!";
        header("Location: ../index.php");
        exit(0);

    } else {
        $query = "INSERT INTO messages (message) VALUES (:msg)";
        $statement = $conn->prepare($query);
    
        $data = [
            ':msg' => $message
        ];
    
        $result = $statement->execute($data);
    
        if ($result) {
            $_SESSION['send-message-success'] = "Message Sent Successfully!";
            header("Location: ../index.php");
            exit(0);
        } else {
            $_SESSION['send-message-failed'] = "Something Went Wrong! Failed To Send Message.";
            header("Location: ../index.php");
            exit(0);
        }
    }
}

// Login 

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {

        $query = "SELECT * FROM users WHERE username=:username LIMIT 1";
        $statement = $conn->prepare($query);
        $data = [':username' => $username];

        $statement->execute($data);
        $result = $statement->fetch();

        if ($statement->rowCount() > 0) {

            if (password_verify($password, $result['password'])) {

                $_SESSION['username'] = $result['username'];
                header("Location: ../messages.php");
            } else {

                $_SESSION['login-failed'] = "Incorrect Password.";
                header("Location: ../login.php");
            }
        } else {

            $_SESSION['login-failed'] = "Incorrect Username.";
            header("Location: ../login.php");
        }
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

// Delete Message 

if (isset($_GET['delete_message'])) {

    $message_id = $_GET['delete_message'];

    try {

        $query =  "DELETE FROM messages WHERE id=:msg_id";
        $statement = $conn->prepare($query);
        $data = [':msg_id' => $message_id];
        $result = $statement->execute($data);

        if ($result) {

            $_SESSION['delete-message-success'] = "Message Deleted Successfully!";
            header("Location: ../messages.php");
            exit(0);
        } else {

            $_SESSION['delete-message-failed'] = "Something Went Wrong! Failed To Delete Message.";
            header("Location: ../messages.php");
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>