var queenAttack = function(x, y) {

  if ((x[0] === y[0]) && (x[1] === y[1])) {
    return false;
  }
  else if ((x[0] - y[0]) === 0 || (x[1] - y[1]) === 0 || Math.abs((x[0] - y[0])) === Math.abs((x[1] - y[1]))) {
    return true;
  }
  else if ((x[0] - y[0]) !== (x[1] - y[1])) {
    return false;
  };
};

$(document).ready(function() {

  $('form#attack-check').submit(function(event) {

    var x = [$('input#x1-coordinate').val(), $('input#x2-coordinate').val()];
    var y = [$('input#y1-coordinate').val(), $('input#y2-coordinate').val()];
    var result = queenAttack(x, y);

    if (!result) {
      $('.not').text('not');
    }
    else {
      $('.not').text('');
    };

    $('#result').show();

    event.preventDefault();

  });
});
