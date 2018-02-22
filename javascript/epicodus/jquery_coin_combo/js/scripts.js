var coinCombo = function(change) {

    var coins = [0, 0, 0, 0];

    var cents = change * 100;

    switch (cents > 0) {
        //quarter
         case (cents >= 25):
            var quarters = Math.floor(cents / 25);
            coins[0] = quarters;
            cents -= (quarters * 25);
        //dimes
        case (cents >= 10):
            var dimes = Math.floor(cents / 10);
            coins[1] = dimes;
            cents -= (dimes * 10);
        //nickels
        case (cents >= 05):
            var nickels = Math.floor(cents / 05);
            coins[2] = nickels;
            cents -= (nickels * 05);
        //pennies
        case (cents >= 01):
            var pennies = Math.floor(cents / 01);
            coins[3] = pennies;
            cents = 0;
            break;
    }

    return coins;

};

$(document).ready(function() {

    $('form#change-input').submit(function(event) {

        var change = $('input#change').val();
        var result = coinCombo(change);

        if (result[0] > 0) {
            $('#p-quarters').show();
        }

        if (result[1] > 0) {
            $('#p-dimes').show();
        }

        if (result[2] > 0) {
            $('#p-nickels').show();
        }

        if (result[3] > 0) {
            $('#p-pennies').show();
        }

        $("#quarters").text(result[0]);
        $("#dimes").text(result[1]);
        $("#nickels").text(result[2]);
        $("#pennies").text(result[3]);

        $('#result').show();
        event.preventDefault();

    });

});
