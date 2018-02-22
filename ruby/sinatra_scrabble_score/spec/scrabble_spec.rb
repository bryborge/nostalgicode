require 'rspec'
require 'scrabble'

describe('String#scrabble') do
  it('returns a scrabble score for a letter') do
    expect('a'.scrabble()).to(eq(1))
  end

  it('returns a scrabble score for a word comprised of letters of the same value') do
    expect('as'.scrabble()).to(eq(2))
  end

  it('returns a scrabble score for a word comprised of letters of different values') do
    expect('dog'.scrabble()).to(eq(5))
  end
end
