<?php
session_start();

if (!isset($_SESSION['user_data']))
    header('Location: /');

$name = $_SESSION['user_data']['name'];
$lastname = $_SESSION['user_data']['lastname'];
$username = $_SESSION['user_data']['username'];
$email = $_SESSION['user_data']['email'];
$pwlength = $_SESSION['user_data']['pw_length'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../include/head.php" ?>
    <link rel="stylesheet" href="/styles/profile.css">
</head>

<body>
    <?php include "../include/navigation_bar.php" ?>
    <section>
        <form id="profile_details">
            <p id="error" style="display: none"></p>
            <p id="success" style="display: none"></p>
            <p id="warning" style="display: none"></p>
            <p><label for="name">Name:</label><input type="text" name="name" id="name" placeholder="<?php echo $name ?>"></p>
            <p><label for="lastname">Last Name:</label><input type="text" name="lastname" id="lastname" placeholder="<?php echo $lastname ?>"></p>
            <p><label for="username">Username:</label><input type="text" name="username" id="username" placeholder="<?php echo $username ?>"></p>
            <p><label for="email">E-mail:</label><input type="email" name="email" id="email" placeholder="<?php echo $email ?>"></p>
            <p><label for="password">Password:</label><input type="password" name="password" id="password" placeholder="<?php for ($i = 0; $i < $pwlength; $i++) echo '*' ?>"></p>
            <p><label for="rpassword">Repeat Password:</label><input type="password" name="rpassword" id="rpassword"></p>
            <p><input type="submit" value="Save"></p>
        </form>
    </section>
    <?php include "../include/footer.php" ?>
</body>

<script>
    var saveButton,
        nameVal = '',
        lastnameVal = '',
        usernameVal = '',
        emailVal = '',
        passwordVal = '',
        rpasswordVal = '';

    $(document).ready(() => {
        $('#error').hide();
        $('#success').hide();
        $('#warning').hide();

        saveButton = $('input[type=submit]');

        $('#name').on('change | keypress', (e) => {
            nameVal = $(e.target).val().length ? $(e.target).val() : '';
        });

        $('#lastname').on('change | keypress', (e) => {
            lastnameVal = $(e.target).val().length ? $(e.target).val() : '';
        });

        $('#username').on('change | keypress', (e) => {
            usernameVal = $(e.target).val().length ? $(e.target).val() : '';
        });

        $('#email').on('change | keypress', (e) => {
            emailVal = $(e.target).val().length ? $(e.target).val() : '';
        });

        $('#password').on('change | keypress', (e) => {
            passwordVal = $(e.target).val().length ? $(e.target).val() : '';
        });

        $('#rpassword').on('change | keypress', (e) => {
            rpasswordVal = $(e.target).val().length ? $(e.target).val() : '';
        });

        saveButton.on('click', (e) => {
            e.preventDefault();

            $('#error').hide();
            $('#success').hide();
            $('#warning').hide();

            if ((passwordVal.length || rpasswordVal.length) & passwordVal != rpasswordVal) {
                $('#error').html('Passwords must be the same!').show();
                return;
            }

            $.post('/updateprofiledetails', {
                name: nameVal,
                lastname: lastnameVal,
                username: usernameVal,
                email: emailVal,
                password: passwordVal
            }).done((data) => {
                const jsonData = JSON.parse(data.match(/({.*})/gm)[0]);
                const errorMessage = data.match(/(.*)(?=({.*}))/gm)[0];

                console.log(errorMessage);

                const code = jsonData.code;
                const message = jsonData.message;

                switch (code) {
                    case -1:
                        $('#error').html(message).show();
                        break;
                    case 0:
                        $('#success').html(message).show();
                        break;
                    default:
                        $('#warning').html(message).show();
                        break;
                }
            });
        });
    });
</script>

</html>