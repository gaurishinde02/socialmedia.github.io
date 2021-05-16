<?php

session_start();

include "../helper/logic.php";
include "../helper/update_post_logic.php";

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
    <title>Update Post</title>

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
        <form method="POST">
            <?php foreach ($posts as $p) { ?>
                <div class="container add">
                    <div class="detailcategory">
                        <strong class="catview"><?php echo $p['type']; ?></strong>
                    </div>
                    <br>
                    <h3 id="addTitle">Update Post</h3>
                    <br>
                    <input type="text" name="postid" value=<?php echo $p['id']; ?> hidden>
                    <input type="text" name="type" value=<?php echo $p['type']; ?> hidden>
                    <input id="title" type="text" size="53" class="title" placeholder="Title" name="title" value='<?php echo $p['title']; ?>' required>
                    <?php if ($p['pictureUrl'] != "") { ?>
                        <br><br>
                        <input id="picture" value=' <?php echo $p['pictureUrl']; ?>' type="text" size="53" class="title" placeholder="Picture Url" name="pictureurl">

                    <?php } ?>
                    <br><br>
                    <input id="hashtag" type="text" size="53" class="title" placeholder="Hash Tags" name="hashtag" value=<?php echo $p['hashtag']; ?> required>
                    <hr class="formhr" width="590px" color="#292929" noshade>
                    <br>
                    <textarea id="des" class="des" cols="56" rows="10" placeholder="Description..." name="description"><?php echo $p['description']; ?></textarea>
                    <br><br>
                    <button name=<?php if($p['type'] == "Image Blog"){?> <?php echo "updateImagepost";} else{?> <?php echo "updatepost";}?> class="submitpost" type= "submit">Update POST</button>
                <?php } ?>
        </form>


    </div>

    </div>


</body>

</html>