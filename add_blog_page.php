<?php

session_start();

include "../helper/logic.php";

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
    <title>New Post</title>

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
        <form method="GET">
            <div class="container add">
                <div class="dropdown">
                    <select name="slct" id="slct">
                        <option value="Blog">Blog</option>
                        <option value="Query">Query</option>
                        <option value="Image Blog">Image Blog</option>
                        <option value="Announcement">Announcement</option>
                    </select>
                </div>
                <br>
                <h3 id="addTitle">Add Post</h3>
                <br>
                <input id="title" type="text" size="53" class="title" placeholder="Title" name="title" required>
                <div id="url" class="picurl hide">
                    <br>
                    <input id="picture" type="text" size="53" class="title" placeholder="Picture Url" name="pictureurl">
                </div>
                <br><br>
                <input id="hashtag" type="text" size="53" class="title" placeholder="Hash Tags" name="hashtag" required>
                <!-- <br><br>
                <button class="tagbtn"># Add tag</button>
                <br><br> -->
                <hr class="formhr" width="590px" color="#292929" noshade>
                <br>
                <textarea id="des" class="des" cols="56" rows="10" placeholder="Description..." name="description"></textarea>
                <br><br>
                <button name="submitpost" class="submitpost">SUBMIT POST</button>
        </form>


    </div>

    </div>

    <script>
        var select = document.querySelector('#slct');
        select.addEventListener('change', function() {
            var selectedVal = $(this).val();
            var des = document.getElementById("des");
            var title = document.getElementById("title");
            var picUrl = document.getElementById("url");
            var pictureText = document.getElementById("picture");
            switch (selectedVal) {
                case 'Blog':
                    document.getElementById("addTitle").innerHTML = "Add Post";
                    title.setAttribute("placeholder", "Title");
                    picUrl.classList.add("hide");
                    pictureText.removeAttribute("required");
                    break;
                case 'Query':
                    document.getElementById("addTitle").innerHTML = "Ask Query";
                    title.setAttribute("placeholder", "Query");
                    picUrl.classList.add("hide");
                    pictureText.removeAttribute("required");
                    break;
                case 'Image Blog':
                    document.getElementById("addTitle").innerHTML = "Add Image Post";
                    title.setAttribute("placeholder", "Title");
                    picUrl.classList.remove("hide");
                    pictureText.setAttribute("required", "");
                    break;
                case 'Announcement':
                    document.getElementById("addTitle").innerHTML = "Add an Announcement";
                    title.setAttribute("placeholder", "Title");
                    picUrl.classList.add("hide");
                    pictureText.removeAttribute("required");
                    break;
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>

</html>