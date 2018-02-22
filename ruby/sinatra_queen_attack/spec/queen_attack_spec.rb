require 'rspec'
require 'queen_attack'

describe('Array#queen_attack?') do
  it('is false if the coordinates are not horizontally, vertically, or diagonally in line with each other') do
    expect([1, 1].queen_attack?([2, 3])).to(eq(false))
  end

  it('is true if the coordinates are horizontally in line with each other') do
    expect([1, 1].queen_attack?([1, 2])).to(eq(true))
  end

  it('is true if the cooridates are vertically in line with each other') do
    expect([1, 2].queen_attack?([2, 2])).to(eq(true))
  end

  it('is true if the cooridates are diagonally inline with each other') do
    expect([1, 1].queen_attack?([3, 3])).to(eq(true))
  end

  it('is false if the coordinates are exactly the same') do
    expect([3, 3].queen_attack?([3, 3])).to(eq(false))
  end
end
