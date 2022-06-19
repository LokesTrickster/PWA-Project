<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../include/head.php" ?>
    <link rel="stylesheet" href="/styles/leaderboard.css">
</head>

<body>
    <?php include "../include/navigation_bar.php" ?>
    <section>
        <form>
            <select name="difficulty" id="difficulty_select">
                <option value="none">Select difficulty...</option>
                <option value="HARD">HARD</option>
                <option value="NORMAL">NORMAL</option>
                <option value="EASY">EASY</option>
            </select>
        </form>

        <script>
            var page = 0;

            var lastPage;


            var prevButton;
            var nextButton;

            var val = '%';

            $(document).ready(async () => {
                prevButton = $('#prevButton');
                nextButton = $('#nextButton');

                await request(page, val, {
                    'prevButton': prevButton,
                    'nextButton': nextButton
                });

                $('#difficulty_select').change(async function() {
                    val = ($(this).val() == 'none') ? '%' : $(this).val();

                    await request(0, val, {
                        'prevButton': prevButton,
                        'nextButton': nextButton
                    });
                });
            });

            async function nextPage() {
                await request(++page, val, {
                    'prevButton': prevButton,
                    'nextButton': nextButton
                });

                nextButton.prop('disabled', page >= lastPage);
            }

            async function prevPage() {
                await request(--page, val, {
                    'prevButton': prevButton,
                    'nextButton': nextButton
                });

                prevButton.prop('disabled', page == 0);
            }

            async function request(page, val, buttons) {
                lastPage = await getLastPage(val);

                await $.ajax({
                    url: '/showleaderboard',
                    method: 'get',
                    data: `page=${page}&val=${val}`,
                    success: (response) => {
                        $('#replace').replaceWith(response);

                        if (buttons !== null && buttons !== undefined) {
                            buttons['prevButton'].attr('disabled', page == 0);
                            buttons['nextButton'].attr('disabled', page == lastPage);
                        }
                    }
                });
            }

            async function getLastPage(diff) {
                var lastPage = 0;

                await $.ajax({
                    url: '/getLastPage',
                    method: 'get',
                    data: `diff=${diff}`,
                    success: (response) => {
                        lastPage = Math.floor(Number.parseInt(response) / 10);
                    }
                });

                return lastPage;
            }
        </script>
        <div id="replace"></div>

        <div class="pageButtons">
            <button id="prevButton" onclick="prevPage()">&lt;</button>
            <button id="nextButton" onclick="nextPage()">&gt;</button>
        </div>
    </section>
    <?php include "../include/footer.php" ?>
</body>

</html>