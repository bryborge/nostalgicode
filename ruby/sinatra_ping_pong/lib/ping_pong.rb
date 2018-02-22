class Fixnum
  define_method(:ping_pong) do
    output = []
    iterations = (0..self)

    iterations.each do |i|
      if i === 0
        output.push(i)
      elsif i.%(3) === 0 && i.%(5) === 0
        output.push('ping pong')
      elsif i.%(3) === 0
        output.push('ping')
      elsif i.%(5) === 0
        output.push('pong')
      else
        output.push(i)
      end
    end

    output
  end
end
