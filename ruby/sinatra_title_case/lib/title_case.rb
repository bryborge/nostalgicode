class String
  define_method(:title_case) do
    exceptions = [
      "a", "an", "the",
      "and", "or", "but", "for", "nor",
      "on", "at", "to", "from", "by", "in"
    ]
    words = self.downcase.split(" ")

    words.each do |word|
      if word === words[0] || !exceptions.include?(word)
        word.capitalize!()
      end
    end

    return words.join(" ")
  end
end
