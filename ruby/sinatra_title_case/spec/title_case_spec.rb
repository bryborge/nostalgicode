require 'rspec'
require 'title_case'

describe('String#title_case') do
  it("capitalizes the first letter of a single word") do
    expect("word".title_case()).to(eq("Word"))
  end

  it("capitalizes the first letter of each word in a string") do
    expect("some words".title_case()).to(eq("Some Words"))
  end

  it("capitalizes articles, coordinating conjunctions, and prepositions only if they the first word in a string") do
    expect("the hitchhiker's guide to the galaxy".title_case()).to(eq("The Hitchhiker's Guide to the Galaxy"))
  end

  it("standardizes a string by lowercasing all words before processing") do
    expect("tHe hiTChHIkeR'S GUIde tO The GaLaXy".title_case()).to(eq("The Hitchhiker's Guide to the Galaxy"))
  end
end
