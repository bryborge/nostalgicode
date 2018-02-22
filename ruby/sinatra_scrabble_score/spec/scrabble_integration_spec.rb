require 'capybara/rspec'
require './app'

Capybara.app = Sinatra::Application

set(:show_exceptions, false)

describe('the scrabble path', {:type => :feature}) do
  it('processes the user entry and returns the scrabble value') do
    visit('/')
    fill_in('word', :with => 'hello')
    click_button('Calculate Score')
    expect(page).to have_content('The word "hello" has a value of 8 points in Scrabble')  
  end
end
