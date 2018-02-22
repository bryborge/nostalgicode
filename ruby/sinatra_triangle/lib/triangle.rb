class Triangle
  define_method(:initialize) do |x, y, z|
    @x = x
    @y = y
    @z = z
  end

  # Is it valid?
  define_method(:valid?) do
    @x.+(@y) > @z && @y.+(@z) > @x && @z.+(@x) > @y
  end

  # All sides are equal
  define_method(:equilateral?) do
    if self.valid?
      @x.eql?(@y) && @y.eql?(@z) && @z.eql?(@x)
    end
  end

  # Exactly two sides are equal
  define_method(:isosceles?) do
    if self.valid?
      @x.eql?(@y) && !@x.eql?(@z) ||
      @y.eql?(@z) && !@y.eql?(@x) ||
      @z.eql?(@x) && !@z.eql?(@y)
    end
  end

  # No sides are equal
  define_method(:scalene?) do
    if self.valid?
      !@x.eql?(@y) && !@y.eql?(@z) && !@z.eql?(@x)
    end
  end

  # Return the triangle type
  define_method(:type) do
    if !self.valid?
      return 'invalid'
    else
      if self.equilateral?
        return 'equilateral'
      elsif self.isosceles?
        return 'isosceles'
      elsif self.scalene?
        return 'scalene'
      end
    end
  end
end
