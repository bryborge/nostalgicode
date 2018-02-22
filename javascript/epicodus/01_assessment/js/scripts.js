// METHOD FOR TRIANGLE CHECKER
function triangleCheck(x, y, z) {

    var triangleType = '';

    if ((x + y) <= z || (y + z) <= x || (z + x) <= y) {
        triangleType = 'noTriangle';
    }
    else if ((x === y) && (y === z)) {
        triangleType = 'equilateral';
    }
    else if ((x === y) || (y === z) || (z === x)) {
        triangleType = 'isosceles';
    }
    else if ((x !== y) && (y !== z) && (z !== x)) {
        triangleType = 'scalene';
    }

    return triangleType;

};


// JQUERY FOR TRIANGLE CHECKER WEB APP
$(document).ready(function() {

    $('form#check-triangle').submit(function(event) {

        var x      = parseInt($('input#x-side').val());
        var y      = parseInt($('input#y-side').val());
        var z      = parseInt($('input#z-side').val());
        var result = triangleCheck(x, y, z);

        if (result === 'noTriangle') {
            alert(x + ', ' + y + ', and ' + z + ' does not form a valid triangle, as described by the Triangle Equality Theorem. Please try again.');
        }
        else if (result === 'equilateral') {
            alert(x + ', ' + y + ', and ' + z + ' form an \'equilateral\' triangle.');
        }
        else if (result === 'isosceles') {
            alert(x + ', ' + y + ', and ' + z + ' form an \'isosceles\' triangle.');
        }
        else if (result === 'scalene') {
            alert(x + ', ' + y + ', and ' + z + ' form a \'scalene\' triangle.');
        }

        event.preventDefault();

    });
});
