var romanNumeral = function(value) {

    var valueRoman = [];

    var four = "IIII";

    while (value > 0) {
        switch (value > 0) {

            case (value >= 1000):
                valueRoman.push('M');
                value = value - 1000;
                break;

            case ((value >= 900) && (value < 1000)):
                valueRoman.push('CM');
                value = value - 900;
                break;

            case ((value >= 500) && (value < 900)):
                valueRoman.push('D');
                value = value - 500;
                break;

            case ((value >= 400) && (value < 500)):
                valueRoman.push('CD');
                value = value - 400;
                break;

            case ((value >= 100) && (value < 400)):
                valueRoman.push('C');
                value = value - 100;
                break;

            case ((value >= 90) && (value < 100)):
                valueRoman.push('XC');
                value = value - 90;
                break;

            case ((value >= 50) && (value < 90)):
                valueRoman.push('L');
                value = value - 50;
                break;

            case ((value >= 40) && (value < 50)):
                valueRoman.push('XL');
                value = value - 40;
                break;

            case ((value >= 10) && (value < 40)):
                valueRoman.push('X');
                value = value - 10;
                break;

            case (value === 9):
                valueRoman.push('IX');
                value = value - 9;
                break;

            case ((value >= 5) && (value < 9)):
                valueRoman.push('V');
                value = value - 5;
                break;

            case ((value < 5) && (value >= 0)):
                for (var i = 1; i <= value; i++) {
                    valueRoman.push('I');
                    value = value - 1;

                    var convert_four = valueRoman.filter(function(element, index, array) {
                        return four.split("").indexOf(element) != -1;
                    });

                    var test = convert_four.join("");

                    if (test === "IIII") {
                        valueRoman.splice((valueRoman.join("").length - 3), valueRoman.length, "V");
                    }
                }
                break;

            //this only runs if nothing else does. stops our while loop.
            default: value = 0;
            break;
        }
    }

    return valueRoman.join("");

};

$(document).ready(function() {

    $('form#value-input').submit(function(event) {
        var input = $('input#value').val();
        var result = romanNumeral(input);

        $("#converted").text(result);

        $('#result').show();
        event.preventDefault();

    });

});
