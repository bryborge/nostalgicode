// PROTOTYPES
var Pizza = {
  cost: 5.00,
  topping: function(type) {
    if (type === "Pepperoni") {
      if (this.cost > 5.00) {  // Controls for increasing the cost every time user clicks submit
        this.cost;
      } else {
        this.cost += 1.50;
      }
    } else if (type === "Cheese") {
      if (this.cost > 5.00) {  // Resets the cost to 5.00 if user chose pepperoni first, but then decided to have no topping instead
        this.cost = 5.00;
      } else {
        this.cost += 0;
      }
    }
  }
};


// jQuery
$(document).ready(function() {

  var newPizza = Object.create(Pizza);

    $("form#pizza-form").submit(function(event) {
        event.preventDefault();

        var toppingType = $("select#topping-type").val();

        newPizza.topping(toppingType);
        newPizza.cost;

        $("#pizza-order").show();
        $("#pizza-name").text(toppingType + " Pizza");
        $("#pizza-cost").text("Your total is: $" + newPizza.cost.toFixed(2));

        $("select#topping-type").val("");  // Resets the drop-down to 'Please select one'

    });

});
