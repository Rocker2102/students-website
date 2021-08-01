<?php   
    if (!isset($pageName))
        $pageName = "Home";
?>

<header class="navbar-fixed">
    <nav>
        <div class="nav-wrapper indigo">
            <a class="brand-logo center-align" id="page-name"><?php echo $pageName; ?></a>
            <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a class="waves-effect" href="index.php"><i class="material-icons left">home</i>Home</a></li>
                <li><a class="waves-effect" href="explore.php"><i class="material-icons left">bookmark</i>Explore</a></li>
                <li><a class="waves-effect" href="javascript:void(0)" onclick="showToast('Student\'s website', 'yellow black-text', 'gavel')"><i class="material-icons left">info</i>About</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-menu">
        <li><a class="waves-effect" href="index.php"><i class="material-icons left">home</i>Home</a></li>
        <li><a class="waves-effect" href="explore.php"><i class="material-icons left">bookmark</i>Explore</a></li>
        <li><a class="waves-effect" href="javascript:void(0)" onclick="showToast('Student\'s website', 'yellow black-text', 'gavel')"><i class="material-icons left">info</i>About</a></li>
    </ul>

    <div id="modal-feedback" class="modal">
        <div class="modal-content container">
            <div class="row">
                <form class="col m12 s12" id="new-feedback">
                    <div class="row"> 
                        <div class="input-field col s12">
                            <select id="select-feedback">
                                <option value="1" selected>About Website</option>
                                <option value="2">Report Bug</option>
                            </select>
                            <label>Feedback Options</label>
                        </div>
                    </div>
                    <div class="feedback-main row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">person</i>
                            <input id="feedback-name" type="text">
                            <label for="feedback-name">Name</label>
                            <span class="helper-text">(Optional)</span>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">mail</i>
                            <input id="feedback-email" type="tel">
                            <label for="feedback-email">Email</label>
                            <span class="helper-text">(Optional)</span>
                        </div>
                    </div>
                    <div class="feedback-website">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">feedback</i>
                                <textarea id="textarea-website" class="materialize-textarea validate" data-length="150" required></textarea>
                                <label for="textarea-website">Feedback</label>
                            </div>
                        </div>
                    </div>
                    <div class="feedback-bug">
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">link</i>
                                <input id="url-bug" type="text" class="validate">
                                <label for="url-bug">URL</label>
                                <span class="helper-text">Example: https://studentsnitsk.ml/explore.php</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">feedback</i>
                                <textarea id="textarea-bug" class="materialize-textarea validate" data-length="150"></textarea>
                                <label for="textarea-bug">Details about the Bug</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col m12 s12 center-align">
                            <button type="button" class="btn red waves-effect" onclick="$('#modal-feedback').modal('close')"><i class="material-icons left">close</i>Close</button>
                            <button id="feedback-submit-btn" type="submit" class="btn green waves-effect waves-light"><i class="material-icons right">keyboard_arrow_right</i>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>