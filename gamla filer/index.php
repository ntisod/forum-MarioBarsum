<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./forum.css">
    <title>WSP1 Forum</title>
</head>
<body>
    <!--Prototyp av index sidan för ett forum av Tim Rundström och Mario Barsum-->
    <!--Header-->

    <?php require '../templates/footer.php'?>


    <!--Main section-->
    <section>
        <h2>Inlägg</h2>

        <!--Sorting and search form-->
        <form action="" method="get">
            <input type="search" name="searchpost" placeholder="Sök" id="search">
            <select name="sortBy" id="sortBy">
                <option value="latest">Latest</option>
                <option value="oldest">Oldest</option>
            </select>
        </form>

        <!--Side photos-->
        <div class="sidePhotos">
            <img src="student-purple-hue.jpg" alt="stockphoto of female student" class="left">
            <img src="college-students-purple-hue.jpg" alt="stockphoto of college graduates" class="right">
        </div>

        <!--Temporary post examples-->
        <article>
            <a>
                <hr>
                <h3>Titel <span>- username | x hours ago</span></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quae quis ab porro sint magnam, eaque minima, eius dolore harum commodi veritatis modi veniam aperiam, rem corporis! Doloribus, sit est. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, qui, corporis tenetur nihil quam sequi dignissimos nulla eius illum aut pariatur fugit totam sunt laboriosam ullam, iure dolorum eveniet ex! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, repudiandae rerum sint praesentium, soluta molestiae sed et tempora dolorem odio quae ipsum quaerat fuga laborum aliquid quibusdam? Voluptates, repellendus numquam!</p>
            </a> 
        </article>
        <article>
            <a>
                <hr>
                <h3>Titel <span>- username | x hours ago</span></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quae quis ab porro sint magnam, eaque minima, eius dolore harum commodi veritatis modi veniam aperiam, rem corporis! Doloribus, sit est. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, qui, corporis tenetur nihil quam sequi dignissimos nulla eius illum aut pariatur fugit totam sunt laboriosam ullam, iure dolorum eveniet ex! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque, repudiandae rerum sint praesentium, soluta molestiae sed et tempora dolorem odio quae ipsum quaerat fuga laborum aliquid quibusdam? Voluptates, repellendus numquam!</p>
            </a>
        </article>
        
        <!--Page buttons-->
        <div class="buttons">
            <a class="previous button">&#8249;</a>
            <a class="number button selected">1</a>
            <a class="number button">2</a>
            <a class="number button">3</a>
            <p> . . . </p>
            <a class="number button">5</a>
            <a class="next button">&#8250;</a>
        </div>
    </section>

    <!--Footer menu-->
    <?php require '../templates/header.php'?>

</body>
</html>