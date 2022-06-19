<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../include/head.php" ?>
    <link rel="stylesheet" href="/styles/play.css">
</head>

<body>
    <?php include "../include/navigation_bar.php" ?>
    <section>
        <?php

        if (isset($_SESSION['user_data'])) {
        ?>
            <div id="diff-select">
                <button>EASY</button>
                <button>MEDIUM</button>
                <button>HARD</button>
            </div>
            <div class="timer" hidden>
                <p>Time elapsed:<span class="time"></span></p>
            </div>
            <div class="board" hidden>
                <div class="row" id="r1">
                    <div class="cell"><input type="number" name="a1" id="a1" unselectable="on"></div>
                    <div class="cell"><input type="number" name="a2" id="a2"></div>
                    <div class="cell"><input type="number" name="a3" id="a3"></div>
                    <div class="cell"><input type="number" name="a4" id="a4"></div>
                    <div class="cell"><input type="number" name="a5" id="a5"></div>
                    <div class="cell"><input type="number" name="a6" id="a6"></div>
                    <div class="cell"><input type="number" name="a7" id="a7"></div>
                    <div class="cell"><input type="number" name="a8" id="a8"></div>
                    <div class="cell"><input type="number" name="a9" id="a9"></div>
                </div>
                <div class="row" id="r2">
                    <div class="cell"><input type="number" name="b1" id="b1"></div>
                    <div class="cell"><input type="number" name="b2" id="b2"></div>
                    <div class="cell"><input type="number" name="b3" id="b3"></div>
                    <div class="cell"><input type="number" name="b4" id="b4"></div>
                    <div class="cell"><input type="number" name="b5" id="b5"></div>
                    <div class="cell"><input type="number" name="b6" id="b6"></div>
                    <div class="cell"><input type="number" name="b7" id="b7"></div>
                    <div class="cell"><input type="number" name="b8" id="b8"></div>
                    <div class="cell"><input type="number" name="b9" id="b9"></div>
                </div>
                <div class="row" id="r3">
                    <div class="cell"><input type="number" name="c1" id="c1"></div>
                    <div class="cell"><input type="number" name="c2" id="c2"></div>
                    <div class="cell"><input type="number" name="c3" id="c3"></div>
                    <div class="cell"><input type="number" name="c4" id="c4"></div>
                    <div class="cell"><input type="number" name="c5" id="c5"></div>
                    <div class="cell"><input type="number" name="c6" id="c6"></div>
                    <div class="cell"><input type="number" name="c7" id="c7"></div>
                    <div class="cell"><input type="number" name="c8" id="c8"></div>
                    <div class="cell"><input type="number" name="c9" id="c9"></div>
                </div>
                <div class="row" id="r4">
                    <div class="cell"><input type="number" name="d1" id="d1"></div>
                    <div class="cell"><input type="number" name="d2" id="d2"></div>
                    <div class="cell"><input type="number" name="d3" id="d3"></div>
                    <div class="cell"><input type="number" name="d4" id="d4"></div>
                    <div class="cell"><input type="number" name="d5" id="d5"></div>
                    <div class="cell"><input type="number" name="d6" id="d6"></div>
                    <div class="cell"><input type="number" name="d7" id="d7"></div>
                    <div class="cell"><input type="number" name="d8" id="d8"></div>
                    <div class="cell"><input type="number" name="d9" id="d9"></div>
                </div>
                <div class="row" id="r5">
                    <div class="cell"><input type="number" name="e1" id="e1"></div>
                    <div class="cell"><input type="number" name="e2" id="e2"></div>
                    <div class="cell"><input type="number" name="e3" id="e3"></div>
                    <div class="cell"><input type="number" name="e4" id="e4"></div>
                    <div class="cell"><input type="number" name="e5" id="e5"></div>
                    <div class="cell"><input type="number" name="e6" id="e6"></div>
                    <div class="cell"><input type="number" name="e7" id="e7"></div>
                    <div class="cell"><input type="number" name="e8" id="e8"></div>
                    <div class="cell"><input type="number" name="e9" id="e9"></div>
                </div>
                <div class="row" id="r6">
                    <div class="cell"><input type="number" name="f1" id="f1"></div>
                    <div class="cell"><input type="number" name="f2" id="f2"></div>
                    <div class="cell"><input type="number" name="f3" id="f3"></div>
                    <div class="cell"><input type="number" name="f4" id="f4"></div>
                    <div class="cell"><input type="number" name="f5" id="f5"></div>
                    <div class="cell"><input type="number" name="f6" id="f6"></div>
                    <div class="cell"><input type="number" name="f7" id="f7"></div>
                    <div class="cell"><input type="number" name="f8" id="f8"></div>
                    <div class="cell"><input type="number" name="f9" id="f9"></div>
                </div>
                <div class="row" id="r7">
                    <div class="cell"><input type="number" name="g1" id="g1"></div>
                    <div class="cell"><input type="number" name="g2" id="g2"></div>
                    <div class="cell"><input type="number" name="g3" id="g3"></div>
                    <div class="cell"><input type="number" name="g4" id="g4"></div>
                    <div class="cell"><input type="number" name="g5" id="g5"></div>
                    <div class="cell"><input type="number" name="g6" id="g6"></div>
                    <div class="cell"><input type="number" name="g7" id="g7"></div>
                    <div class="cell"><input type="number" name="g8" id="g8"></div>
                    <div class="cell"><input type="number" name="g9" id="g9"></div>
                </div>
                <div class="row" id="r8">
                    <div class="cell"><input type="number" name="h1" id="h1"></div>
                    <div class="cell"><input type="number" name="h2" id="h2"></div>
                    <div class="cell"><input type="number" name="h3" id="h3"></div>
                    <div class="cell"><input type="number" name="h4" id="h4"></div>
                    <div class="cell"><input type="number" name="h5" id="h5"></div>
                    <div class="cell"><input type="number" name="h6" id="h6"></div>
                    <div class="cell"><input type="number" name="h7" id="h7"></div>
                    <div class="cell"><input type="number" name="h8" id="h8"></div>
                    <div class="cell"><input type="number" name="h9" id="h9"></div>
                </div>
                <div class="row" id="r9">
                    <div class="cell"><input type="number" name="i1" id="i1"></div>
                    <div class="cell"><input type="number" name="i2" id="i2"></div>
                    <div class="cell"><input type="number" name="i3" id="i3"></div>
                    <div class="cell"><input type="number" name="i4" id="i4"></div>
                    <div class="cell"><input type="number" name="i5" id="i5"></div>
                    <div class="cell"><input type="number" name="i6" id="i6"></div>
                    <div class="cell"><input type="number" name="i7" id="i7"></div>
                    <div class="cell"><input type="number" name="i8" id="i8"></div>
                    <div class="cell"><input type="number" name="i9" id="i9"></div>
                </div>
            </div>

            <script>
                var difficulty;
                var timerHandle;

                const grid = [];

                function swapNumbers(first, second) {
                    grid.forEach((arr, i) => arr.forEach((element, j) => {
                        const val = $(element).val();
                        if (val == first)
                            $(element).val(second);
                        else if (val == second)
                            $(element).val(first);
                    }));
                }

                function swapRows(first, second) {
                    const tempRowVals = [];

                    (grid[first]).forEach((element, idx) => {
                        tempRowVals[idx] = $(element).val();
                    });

                    for (var i = 0; i < 9; i++)
                        $(grid[first][i]).val($(grid[second][i]).val());

                    for (var i = 0; i < 9; i++)
                        $(grid[second][i]).val(tempRowVals[i]);
                }

                function swapCols(first, second) {
                    const tempColVals = [];

                    for (var i = 0; i < 9; i++) {
                        tempColVals[i] = $(grid[i][first]).val();
                        $(grid[i][first]).val($(grid[i][second]).val());
                    }

                    for (var i = 0; i < 9; i++)
                        $(grid[i][second]).val(tempColVals[i]);
                }

                function swap3x3Rows(first, second) {
                    for (var i = 0; i < 3; i++)
                        swapRows(first * 3 + i, second * 3 + i);
                }

                function swap3x3Cols(first, second) {
                    for (var i = 0; i < 3; i++)
                        swapCols(first * 3 + i, second * 3 + i);
                }

                async function generateSudoku() {
                    const rows = [
                        [1, 2, 3, 4, 5, 6, 7, 8, 9],
                        [4, 5, 6, 7, 8, 9, 1, 2, 3],
                        [7, 8, 9, 1, 2, 3, 4, 5, 6],
                        [2, 3, 1, 5, 6, 4, 8, 9, 7],
                        [5, 6, 4, 8, 9, 7, 2, 3, 1],
                        [8, 9, 7, 2, 3, 1, 5, 6, 4],
                        [3, 1, 2, 6, 4, 5, 9, 7, 8],
                        [6, 4, 5, 9, 7, 8, 3, 1, 2],
                        [9, 7, 8, 3, 1, 2, 6, 4, 5]
                    ];

                    rows.forEach((arr, i) => arr.forEach((val, j) => {
                        $(grid[i][j]).val(val);
                    }));

                    for (var i = 1; i <= 9; i++) {
                        const randNumber = Math.floor(Math.random() * 10) % 9 + 1;

                        swapNumbers(i, randNumber);
                    }

                    for (var i = 0; i < 9; i++) {
                        const randNum = Math.floor(Math.random() * 10) % 3;

                        const blockNum = Math.floor(i / 3);

                        swapRows(i, blockNum * 3 + randNum);
                    }

                    for (var i = 0; i < 9; i++) {
                        const randNum = Math.floor(Math.random() * 10) % 3;

                        const blockNum = Math.floor(i / 3);

                        swapCols(i, blockNum * 3 + randNum);
                    }

                    for (var i = 0; i < 3; i++) {
                        const randNum = Math.floor(Math.random() * 10) % 3;

                        swap3x3Rows(i, randNum);
                    }

                    for (var i = 0; i < 3; i++) {
                        const randNum = Math.floor(Math.random() * 10) % 3;

                        swap3x3Cols(i, randNum);
                    }
                }

                function getRandomInt(min, max) {
                    return Math.floor(Math.random() * (max - min) + min);
                }

                function cleanBoard() {
                    const toRemove = {
                        'EASY': 81 - getRandomInt(40, 56),
                        'MEDIUM': 81 - getRandomInt(25, 36),
                        'HARD': 81 - getRandomInt(17, 25)
                    };

                    var count = toRemove[difficulty];

                    while (count) {
                        const randRow = getRandomInt(0, 9);
                        const randCol = getRandomInt(0, 9);

                        if ($(grid[randRow][randCol]).val() === '')
                            continue;

                        $(grid[randRow][randCol]).val('');

                        count--;
                    }

                    grid.forEach(arr => arr.forEach(element => {
                        if (Number.parseInt($(element).val()))
                            $(element).attr('disabled', true);
                    }));
                }

                function selectDifficulty({
                    target
                }) {
                    var diff = $(target).html();
                    difficulty = diff;

                    $('#diff-select').hide();

                    cleanBoard();

                    $('.board').attr('hidden', false);

                    timerHandle = setInterval(timer, 1000);

                    $('.timer').attr('hidden', false);
                }

                var seconds;

                String.prototype.toHHMMSS = function() {
                    var sec_num = parseInt(this, 10);
                    var hours = Math.floor(sec_num / 3600);
                    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
                    var seconds = sec_num - (hours * 3600) - (minutes * 60);

                    if (hours < 10) {
                        hours = "0" + hours;
                    }
                    if (minutes < 10) {
                        minutes = "0" + minutes;
                    }
                    if (seconds < 10) {
                        seconds = "0" + seconds;
                    }
                    return hours + ':' + minutes + ':' + seconds;
                }

                function timer() {
                    seconds++;

                    $('.time').html(seconds.toString().toHHMMSS());
                }

                function safeRows(rowNum, valNum) {
                    for (col of grid[rowNum])
                        if ($(col).val() === valNum)
                            return false;

                    return true;
                }

                function safeCols(colNum, valNum) {
                    for (var i = 0; i < 9; i++)
                        if ($(grid[i][colNum]).val() === valNum)
                            return false;

                    return true;
                }

                function safe3x3(rowNum, colNum, valNum) {
                    const startRow = rowNum - rowNum % 3,
                        startCol = colNum - colNum % 3;

                    for (var x = 0; x < 3; x++)
                        for (var y = 0; y < 3; y++)
                            if ($(grid[startRow + x][startCol + y]).val() === valNum)
                                return false;

                    return true;
                }

                function checkSudoku() {
                    var isValid = true;

                    grid.forEach(arr => {

                        if (!isValid) return;

                        arr.forEach(el => {
                            var row = el.id[0].charCodeAt() - 'a'.charCodeAt();
                            var col = Number.parseInt(el.id[1]) - 1;
                            var val = $(el).val();
                            $(el).val('');

                            if (!safeRows(row) || !safeCols(col, val) || !safe3x3(row, col, val)) {
                                isValid = false;

                                $(el).val(val);

                                return;
                            }

                            $(el).val(val);
                        });
                    });

                    return isValid;
                }

                $(document).ready(() => {
                    for (var i = 1; i <= 9; i++) {
                        grid[i - 1] = $(`#r${i} input`).toArray();
                    }

                    seconds = 0;

                    $('.time').html(seconds.toString().toHHMMSS());

                    generateSudoku();

                    $('.board').attr('hidden', true);

                    $('#diff-select button').on('click', selectDifficulty);


                    $('.cell input').attr('unselectable', 'on')
                        .css({
                            '-moz-user-select': '-moz-none',
                            '-moz-user-select': 'none',
                            '-o-user-select': 'none',
                            '-khtml-user-select': 'none',
                            '-webkit-user-select': 'none',
                            '-ms-user-select': 'none',
                            'user-select': 'none'
                        })
                        .bind('selectstart', () => {
                            return false;
                        }).bind('keydown', (e) => {


                            switch (e.key) {
                                case "ArrowRight": {
                                    if ($(e.target).is($('.row .cell:last-child input')))
                                        break;
                                    else {
                                        var row = e.target.id[0];
                                        var col = Number.parseInt(e.target.id[1]) + 1;

                                        while ($(`input#${row}${col}`).attr('disabled') === 'disabled') {
                                            col++;
                                            if (col > 9) break;
                                        }

                                        $(`input#${row}${col}`).focus();
                                    }
                                }
                                break;
                            case "ArrowLeft": {
                                if ($(e.target).is($('.row .cell:first-child input')))
                                    break;
                                else {
                                    var row = e.target.id[0];
                                    var col = Number.parseInt(e.target.id[1]) - 1;

                                    while ($(`input#${row}${col}`).attr('disabled') === 'disabled') {
                                        col--;
                                        if (col < 1) break;
                                    }

                                    $(`input#${row}${col}`).focus();
                                }
                            }
                            break;
                            case "ArrowUp": {
                                e.preventDefault();
                                if ($(e.target).is($('.row:first-child input')))
                                    break;
                                else {
                                    var row = String.fromCharCode(e.target.id[0].charCodeAt() - 1);
                                    var col = Number.parseInt(e.target.id[1]);

                                    while ($(`input#${row}${col}`).attr('disabled') === 'disabled') {
                                        if (row === 'a')
                                            break;

                                        row = String.fromCharCode(row.charCodeAt() - 1);
                                    }

                                    $(`input#${row}${col}`).focus();
                                }
                            }
                            break;
                            case "ArrowDown": {
                                e.preventDefault();
                                if ($(e.target).is($('.row:last-child input')))
                                    break;
                                else {
                                    var row = String.fromCharCode(e.target.id[0].charCodeAt() + 1);
                                    var col = Number.parseInt(e.target.id[1]);

                                    while ($(`input#${row}${col}`).attr('disabled') === 'disabled') {
                                        if (row === 'i')
                                            break;

                                        row = String.fromCharCode(row.charCodeAt() + 1);
                                    }

                                    $(`input#${row}${col}`).focus();
                                }
                            }
                            break;
                            case "Backspace":
                            case "Delete": {
                                $(e.target).val('');
                            }
                            break;
                            default: {
                                e.preventDefault();
                                if (/[^1-9]/.test(e.key))
                                    break;

                                $(e.target).val(e.key);

                                console.log(checkSudoku());

                                if (checkSudoku()) {
                                    clearInterval(timerHandle);

                                    $('.board').html(`<h1>You Won!</h1><p>Finished in ${seconds.toString().toHHMMSS()}s </p>`);

                                    $.post('/insertwin', {
                                        timeElapsed: $('.time').html(),
                                        difficulty: difficulty
                                    }).done((response) => {
                                        console.log(response);
                                    });
                                }
                            }
                            break;
                            }
                        });
                });
            </script>
        <?php
        } else {
        ?>
            <h1>You must be logged in to play! <a href="/login">Login here</a></h1>
        <?php
        }
        ?>
    </section>
    <?php include "../include/footer.php" ?>
</body>

</html>