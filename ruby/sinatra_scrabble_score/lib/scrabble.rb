class String
  define_method(:scrabble) do
    score = 0
    word = self.upcase.split("")

    word.each do |letter|
      score += get_value(letter)
    end

    return score
  end

  define_method(:get_value) do |char|
    value = 0
    score_chart = {
      1 => ["A", "E", "I", "O", "U", "L", "N", "R", "S", "T"],
      2 => ["D", "G"],
      3 => ["B", "C", "M", "P"],
      4 => ["F", "H", "V", "W", "Y"],
      5 => ["K"],
      8 => ["J", "X"],
      10 => ["Q", "Z"],
    }

    score_chart.each_pair do |letter_value, letters|
      letters.each do |letter|
        if (letter.include?(char))
          value += letter_value
        end
      end
    end

    return value
  end
end
