<?php

session_start();

include '../helper/logic.php';
include '../helper/delete_post_logic.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6fefde99a0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/styles.css">
    <title>Geekster</title>


</head>

<body>
    <div class="navbar">
        <ul>
            <a href="../PostPages/index.php" class="logo">Geekster</a>

            <li class="texti"><a href="../SearchPage/search.php">Search</a></li>
            <li class="texti"><a href="../PostPages/normal_blogs.php">Posts</a></li>
            <li class="texti"><a href="../PostPages/index.php">Image Blogs</a></li>
            <li class="texti"><a href="../PostPages/query_blogs.php">Questions</a></li>
            <li class="texti"><a href="../PostPages/announcements_blogs.php">Announcements</a></li>
            <li>
                <div class="sizedbox"></div>
            </li>
            <li>
                <a href="../AddingPostPage/add_blog_page.php">
                    <div class="create">
                        <i class="fas fa-plus-circle" style="display: inline-block;"></i>
                        <h5>Create</h5>
                    </div>
                </a>

            </li>

        </ul>
    </div>
    <div class="wrapper">
        <div class="sidebar">
            <a href="#">
                <div class="row">
                    <img src=<?php if ($_SESSION['profileUrl'] != NULL) { ?> <?php echo $_SESSION['profileUrl'];
                                                                            } else { ?><?php echo "..\images\default.png";
                                                                            } ?> alt="" height="50px" width="50px">
                    <div class="col-md-2">
                        <h6 class="username"><?php echo $_SESSION['username']; ?></h6>
                        <h6 class="email"><?php echo $_SESSION['email']; ?></h6>
                    </div>
                </div>
            </a>
            <ul>
                <li><a href="../PostPages/index.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="../../../GauriWork/profile.php"><i class="fas fa-user-circle"></i>My Profile</a></li>
                <li><a href="../PostPages/my_posts.php"><i class="fas fa-blog"></i>My Posts</a></li>
                <li><a href="../PostPages/my_blogs.php"><i class="fas fa-image"></i>My Blogs</a></li>
                <li><a href="../PostPages/my_query.php"><i class="fas fa-question"></i>My Questions</a></li>
            </ul>
        </div>
        <div class="main_content">

            <?php foreach ($query as $q) {
                $result = mysqli_query($conn, "SELECT getUsername('" . $q['userID'] . "')")
                    or die(mysqli_error($conn));
                $username = mysqli_fetch_array($result);
                $postID = $q['id'];
                $sqlcomment = 'SELECT COUNT(comments.postID) FROM comments WHERE ' . "$postID" . ' = comments.postID';
                $querycomment = mysqli_query($conn, $sqlcomment);
                $counts = mysqli_fetch_array($querycomment);

                if ($q['type'] == "Image Blog" and $q['userID'] == $_SESSION['id']) { ?>
                    <div class="post imgblog">
                        <div class="row" style="margin:0;">
                            <div class="postcat">
                                <strong class="cat"><?php echo $q['type']; ?></strong>
                            </div>

                            <a style="margin-left:30px; font-size: 14px; margin-top: 2px;" class="learnmore" href="../AddingPostPage/edit_page.php?editpostid=<?php echo $q['id']; ?>"> Edit </a>

                            <form method="GET">
                                <input type="text" hidden name="postid" value="<?php echo $q["id"]; ?>">
                                <button type="submit" style="margin-left: 15px; color:#ff5252; font-size: 14px;" name="delete"> Delete </button>
                            </form>
                        </div>

                        <img class="postimg" src="<?php echo $q['pictureUrl']; ?>" alt="" height="250px" width="250px">
                        <h1 class="posttitle"><?php echo $q['title']; ?></h1>
                        <h5 class="postdes"><?php echo $q['description']; ?></h5>
                        <a href="../PostPages/blog_view.php?id=<?php echo $q['id']; ?>" class="learnmore">Learn More</a>
                        <h6 class="username" style="width:500px; margin-top:10px; margin-bottom:5px; font-size:12px;"><?php echo $q['hashtag']; ?></h6>

                        <div class="row postinfo">
                            <img src="../images/default.png" alt="" height="30px" width="30px">
                            <div class="col-md-2">
                                <h6 class="username" style="width:300px"><?php echo $username[0]; ?></h6>
                            </div>

                        </div>

                        <div class="row postcat">

                            <p class="datetime"><?php echo $q['timestamp']; ?></p>
                            <a href="../CommentPage/comments_page.php?commentid=<?php echo $q['id']; ?>">
                                <i class="fas fa-comment chat">
                                    <h6 class="comments"><?php echo $counts[0]; ?></h6>
                                </i>
                            </a>

                        </div>
                        <a href="../CommentPage/comments_page.php?commentid=<?php echo $q['id']; ?>" class="seecomment" id="seecomment">See all comments</a>

                    </div>

            <?php }
            } ?>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>