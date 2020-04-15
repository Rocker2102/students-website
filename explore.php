<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Explore</title>
        <link rel="icon" href="assets/img/logo.png" type="image/png" />
        <link rel="stylesheet" href="assets/css/materialize.min.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    </head>

    <body>
        <?php $pageName = "Resources"; ?> <!-- '$pagename' is checked in 'header.php' -->
        <?php include "includes/header.php"; ?>

        <main class="container">
            <div class="card z-depth-2 hoverable">
                <div class="card-tabs">
                    <div>
                        <ul class="tabs tabs-fixed-width z-depth-1 teal lighten-5">
                            <li class="tab col m3"><a class="active" href="#all-sems">Search Resources</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content grey lighten-4 card-wrapper">
                    <div id="all-sems" class="col m12 s12">         
                        <form id='new-search' method='POST'>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <i class="material-icons prefix">date_range</i>
                                    <select id="search-batch">
                                        <option value="" selected>All</option>
                                        <option value="2018">2018 - 19</option>
                                        <option value="2019">2019 - 20</option>
                                    </select>
                                    <label>Batch</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <i class="material-icons prefix">format_list_numbered</i>
                                    <select id="search-sem">
                                        <option value="" selected>All</option>
                                        <option value="1">Semster I</option>
                                        <option value="2">Semster II</option>
                                        <option value="3">Semster III</option>
                                        <option value="4">Semster IV</option>
                                        <option value="5" disabled>Semster V</option>
                                        <option value="6">Semster VI</option>
                                        <option value="7" disabled>Semster VII</option>
                                        <option value="8" disabled>Semster VIII</option>
                                    </select>
                                    <label>Semester</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <i class="material-icons prefix">subject</i>
                                    <select id="search-sub">
                                        <option value="" selected>All</option>
                                    </select>
                                    <label>Subject</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <i class="material-icons prefix">description</i>
                                    <select id="search-type">
                                        <option value="" selected>All</option>
                                        <option value="1">Mid-Sem 1</option>
                                        <option value="2">Mid-Sem 2</option>
                                        <option value="3">End-Sem</option>
                                        <option value="4">Assignments & Notes</option>
                                        <option value="5" disabled>Others</option>
                                    </select>
                                    <label>Type</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <i class="material-icons prefix">label_outline</i>
                                    <input type="text" class="validate" id="search-hint">
                                    <label for="search-hint">Name</label>
                                    <span class="helper-text">(Optional)</span>
                                </div>
                            </div>
                
                            <div class="row">
                                <div class='col m12 s12 center-align'>
                                    <button type='reset' class='btn waves-effect red darken-3'><i class="material-icons left">undo</i>Reset</button>
                                    <button type='submit' class='btn waves-effect blue darken-2' target-sem="1"><i class="material-icons left">search</i>Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col m12 s12 center-align hide" id="result-preloader"></div>
                        </div>

                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header"><i class="material-icons circle">folder</i>Result Set<span class="new badge orange" data-badge-caption="" id="search-result-name">-</span></div>
                                <div class="collapsible-body result-contents" id="search-result-set">

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="my-gap-30"></div>
        </main>

        <?php include "includes/footer.html"; ?>
    </body>

    <script>
        let breadcrumbData = {
            name: ["Home", "Explore"],
            link: ["index.php", "#!"]
        };
    </script>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/explore.js"></script>
</html>