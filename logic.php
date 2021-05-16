 <?php

    $conn = mysqli_connect("localhost", "root", "", "dbms_project");

    if (!$conn) {
        die("ERROR: COULD NOT CONNECT" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM newblogs ORDER BY timestamp DESC";
    $query = mysqli_query($conn, $sql);
    
    if (isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM newblogs WHERE id = $id";
        $query = mysqli_query($conn, $sql);

        $sqla = "SELECT * FROM comments WHERE postID = $id";
        $answers = mysqli_query($conn, $sqla);
    }

    if (isset($_REQUEST["submitpost"])) {
        $title = $_REQUEST['title'];
        $description = $_REQUEST['description'];
        $userID = $_SESSION['id'];
        $type = $_REQUEST['slct'];
        $hashtag = $_REQUEST['hashtag'];
        $url = $_REQUEST['pictureurl']; 

        $sql = "INSERT INTO newblogs(userID, title, description, type, pictureUrl, hashtag) VALUES($userID,'$title','$description','$type', '$url','$hashtag')";

        if (mysqli_query($conn, $sql)) {
            // echo "<h3>data stored in a database successfully."
            //     . " Please browse your localhost php my admin"
            //     . " to view the updated data</h3>";

            // echo nl2br("\n$first_name\n $last_name\n "
            //     . "$gender\n $address\n $email");
        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        header("Location: ../PostPages/index.php?info=added"); //This is used to redirect to a different php link

        exit();

        mysqli_close($conn);
    }
        if (isset($_REQUEST["commentSubmit"])) {
            $message = $_REQUEST['message'];
            $userID = $_SESSION['id'];
            $postID = $_REQUEST['id'];

            $sql = "INSERT INTO comments(userID, postID, message) VALUES($userID,$postID,'$message')";

            if (mysqli_query($conn, $sql)) {
                // echo "<h3>data stored in a database successfully."
                //     . " Please browse your localhost php my admin"
                //     . " to view the updated data</h3>";

                // echo nl2br("\n$first_name\n $last_name\n "
                //     . "$gender\n $address\n $email");
            } else {
                echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
            }

            header("Location: ../CommentPage/comments_page.php?commentid=$postID"); //This is used to redirect to a different php link

            exit();

            mysqli_close($conn);
        }

    if (isset($_REQUEST['commentid'])) {
        $id = $_REQUEST['commentid'];
   
        $sqlc = "SELECT * FROM comments WHERE postID = $id";
        $comments = mysqli_query($conn, $sqlc);
    }

    if (isset($_REQUEST['editpostid'])) {
        $id = $_REQUEST['editpostid'];

        $sql = "SELECT * FROM newblogs WHERE newblogs.id = $id";
        $posts = mysqli_query($conn, $sql);
    }

?>