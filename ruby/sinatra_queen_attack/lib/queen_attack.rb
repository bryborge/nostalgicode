class Array
  define_method(:queen_attack?) do |b|
    a = self
    if (a === b)
      return false
    elsif (a[0] - b[0] === 0 || a[1] - b[1] === 0 || (a[0] - b[0]).abs === (a[1] - b[1]).abs)
      return true
    elsif ((a[0] - b[0]) != (a[1] - b[1]))
      return false
    end
  end
end
