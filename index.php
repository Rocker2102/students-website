<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="icon" href="assets/img/logo.png" type="image/png" />
        <link rel="stylesheet" href="assets/css/materialize.min.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    </head>

    <body>
        <?php $pageName = "Home"; ?> <!-- '$pagename' is checked in 'header.php' -->
        <?php include "includes/header.php"; ?>

        <main class="container">
            <div>
                <ul class="collapsible">
                    <li class="active">
                        <div class="collapsible-header deep-purple lighten-4"><i class="material-icons">filter_drama</i>Notices</div>
                        <div class="collapsible-body deep-purple lighten-5">
                            <p><i class="material-icons left">label</i>Nothing new...</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header orange lighten-4"><i class="material-icons">whatshot</i>Whats New</div>
                        <div class="collapsible-body orange lighten-5">
                            <p><i class="material-icons left">label</i>Added previous year's (2018-19) question papers of 1<sup>st</sup> Semester.</p>
                            <p><i class="material-icons left">label</i>Added previous year's (2018-19) question papers of 2<sup>nd</sup> Semester.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header lime lighten-4"><i class="material-icons">bookmark</i>Explore</div>
                        <div class="collapsible-body lime lighten-5">
                            <p>Find what you need right here!</p>
                            <p><a class="btn waves-effect light-blue accent-3 z-depth-2" href="explore.php"><i class="material-icons left">fiber_smart_record</i>Go to Page</a></p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="my-gap-30"></div>
        </main>

        <?php include "includes/footer.html"; ?>
    </body>

    <script>
        /* breadcrumb data used in main.js to dynamically show breadcrumbs */
        let breadcrumbData = {
            name: ["Home"],
            link: ["#!"]
        };
    </script>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/main.js"></script>
</html>