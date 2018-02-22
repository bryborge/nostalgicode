describe('triangleCheck', function() {
    it('is an equilateral triangle if all sides of the triangle are equal in length to one another', function() {
        expect(triangleCheck(3, 3, 3)).to.equal('equilateral');
    });

    it('is an isosceles triangle if exactly two sides of the triangle are equal in length to one another', function() {
        expect(triangleCheck(2, 2, 3)).to.equal('isosceles');
    });

    it('is a scalene triangle if no sides of the triangle are equal to one another', function() {
        expect(triangleCheck(3, 4, 5)).to.equal('scalene');
    });

    it('is not a triangle if the longest side is longer than the sum of the remaining two sides, which are equal in length othe one another', function() {
        expect(triangleCheck(2, 2, 8)).to.equal('noTriangle');
    });

    it('is not a triangle if the longest side is longer than the sum of the remaining two sides, which are not equal in length to one another', function() {
        expect(triangleCheck(4, 6, 17)).to.equal('noTriangle');
    });

    it('is not a triangle if the longest side is equal in length to the sum of the remaining two sides', function() {
        expect(triangleCheck(3, 5, 8)).to.equal('noTriangle');
    });

});
