$(function() {

  /* This code prompts the user to enter a number into a pop-up box, and then produces a list of numbers (from smallest to largest by increments of one) up to and including the number submitted by the user.  If a number in the list is divisible by three, "pong" is put in that number's place.  If a number in the list is divisible by five, "ping" is put in that number's place.  If a number in the list is divisible by three and five, "ping-pong"  is put in that number's place in the list. */

  var userInput = parseInt(prompt("Please enter a number."));
  var listItems = ""

  for (i = 1; i <= userInput; i++) {

    listItems += "<li>"

    if (i % 3 === 0 && i % 5 === 0) {
      listItems += "ping-pong";
    }
    else if (i % 3 === 0) {
      listItems += "ping";
    }
    else if (i % 5 === 0) {
      listItems += "pong";
    }
    else {
      listItems += i;
    };

    listItems += "</li>";

  };

  $("ul#list").append(listItems);

});
