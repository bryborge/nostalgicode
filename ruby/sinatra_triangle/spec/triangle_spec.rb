require 'rspec'
require 'triangle'

describe('Triangle') do
  describe('#valid?') do
    it('returns false if it is not a valid triangle') do
      test_triangle = Triangle.new(2, 2, 7)
      expect(test_triangle.valid?()).to(eq(false))
    end

    it('returns true if it is a valid triangle') do
      test_triangle = Triangle.new(2, 3, 4)
      expect(test_triangle.valid?()).to(eq(true))
    end
  end

  describe('#equilateral') do
    it('returns true if it is an equilateral triangle') do
      test_triangle = Triangle.new(2, 2, 2)
      expect(test_triangle.equilateral?()).to(eq(true))
    end

    it('returns false if it is not an equilateral triangle') do
      test_triangle = Triangle.new(3, 4, 5)
      expect(test_triangle.equilateral?()).to(eq(false))
    end
  end

  describe('#isosceles') do
    it('returns true if it is an isosceles triangle') do
      test_triangle = Triangle.new(2, 2, 3)
      expect(test_triangle.isosceles?()).to(eq(true))
    end

    it('returns false if it is not an isosceles triangle') do
      test_triangle = Triangle.new(2, 2, 2)
      expect(test_triangle.isosceles?()).to(eq(false))
    end
  end

  describe('#scalene') do
    it('returns true if it is a scalene triangle') do
      test_triangle = Triangle.new(2, 3, 4)
      expect(test_triangle.scalene?()).to(eq(true))
    end

    it('returns false if it is not a scalene triangle') do
      test_triangle = Triangle.new(2, 2, 2)
      expect(test_triangle.scalene?()).to(eq(false))
    end
  end
end
