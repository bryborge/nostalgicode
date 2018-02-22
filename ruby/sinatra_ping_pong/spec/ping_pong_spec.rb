require 'rspec'
require 'ping_pong'

describe('Fixnum#ping_pong') do
  it("counts from 0 to any given positive number") do
    expect(2.ping_pong()).to(eq([0, 1, 2]))
  end

  it("returns the number given if the number given is 0") do
    expect(0.ping_pong()).to(eq([0]))
  end

  it("replaces multiples of 3 with the word 'ping'") do
    expect(3.ping_pong()).to(eq([0, 1, 2, 'ping']))
  end

  it("replaces multiples of 5 with the word 'pong'") do
    expect(5.ping_pong()).to(eq([0, 1, 2, 'ping', 4, 'pong']))
  end

  it("replaces multiples of 3 and 5 with the word 'ping pong'") do
    expect(15.ping_pong()).to(eq([0, 1, 2, 'ping', 4, 'pong', 'ping', 7, 8, 'ping', 'pong', 11, 'ping', 13, 14, 'ping pong']))
  end
end
