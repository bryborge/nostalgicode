describe("Pizza", function() {
  describe ("topping()", function() {
    it("The base price of pizza remains at $5.00 when cheese pizza is selected", function() {
      var testPizza = Object.create(Pizza);
      testPizza.topping("Cheese");
      expect(testPizza.cost).to.equal(5.00);
    });
  });

  describe ("topping()", function() {
    it("Increases the base price of pizza by $1.50 when pepperoni pizza is selected", function() {
      var testPizza = Object.create(Pizza);
      testPizza.topping("Pepperoni");
      expect(testPizza.cost).to.equal(6.50);
    });
  });
});

// describe("Pizza", function() {
//   describe ("cheese()", function() {
//     it("The base price of pizza remains at $5.00 when cheese pizza is selected", function() {
//       var testPizza = Object.create(Pizza);
//       testPizza.cheese();
//       expect(testPizza.cost).to.equal(5.00);
//     });
//   });
//
//   describe ("pepperoni()", function() {
//     it("Increases the base price of pizza by $1.00 when pepperoni pizza is selected", function() {
//       var testPizza = Object.create(Pizza);
//       testPizza.pepperoni();
//       expect(testPizza.cost).to.equal(6.00);
//     });
//   });
// });
