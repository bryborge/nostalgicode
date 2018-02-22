describe('queenAttack', function() {
  it('is false if the coordinates are not horizontally, vertically, or diagonally in line with each other', function() {
    queenAttack([1, 1], [2, 3]).should.equal(false);
  });

  it('is true if the coordinates are horizontally in line with each other', function() {
    queenAttack([1, 1], [1, 3]).should.equal(true);
  });

  it('is true if the coordinates are vertically in line with each other', function() {
    queenAttack([2, 2], [3, 2]).should.equal(true);
  });

  it('is true if the coordinates are diagonally in line with each other', function() {
    queenAttack([0, 0], [2, 2]).should.equal(true);
  });

  it('is false if the coordinates are exactly the same', function() {
    queenAttack([2, 2], [2, 2]).should.equal(false);
  });
});
