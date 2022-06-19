<?php
session_start();

$url = preg_replace("/(index)?\.(php|html)/", "", $_SERVER['PHP_SELF']);
?>
<header>
    <script>
        $(document).click((event) => {
            if (($(event.target)[0] === $('.profile-button > i')[0]) || ($(event.target)[0] === $('.profile-button')[0])) {
                $('.profile-nav').toggleClass('visible');
            } else {
                $('.profile-nav').removeClass('visible');
            }
        });
    </script>
    <nav class="navbar">
        <button class="nav-toggle"><i class="fa-solid fa-bars"></i></button>
        <div class="nav-body" id="navbody">
            <a href="/" class="nav-link nav-logo"><img src="/img/logo.svg"></img></a>
            <a <?php if ($url != "/play") echo "href=\"/play\""; ?> role="link" class="nav-link<?php if ($url == "/play") echo " disabled"; ?>">Play</a>
            <a <?php if ($url != "/leaderboard") echo "href=\"/leaderboard\""; ?> role="link" class="nav-link<?php if ($url == "/leaderboard") echo " disabled"; ?>">Leaderboard</a>
        </div>
        <div class="profile-body">
            <?php if(isset($_SESSION['user_data'])) { ?>
            <span>Welcome, <?php echo '<b>'.$_SESSION['user_data']['username'].'</b>'; ?>!</span>
            <?php } ?>
            <button class="profile-button"><i class="fa-regular fa-user"></i></button>
            <div class="profile-nav">
                <?php
                if (isset($_SESSION['user_data'])) {
                ?>
                    <a href="/profile" class="profile-link">Profile</a>
                    <a href="/logout" class="profile-link">Logout</a>
                <?php
                } else {
                ?>
                    <a href="/login" class="profile-link">Login</a>
                    <a href="/register" class="profile-link">Register</a>
                <?php
                }
                ?>
            </div>
        </div>

    </nav>

</header>
<div class="spacer"></div>