require 'capybara/rspec'
require './app'

Capybara.app = Sinatra::Application

set(:show_exceptions, false)

describe('The queen attack path', {:type => :feature}) do
  it('processes the user entry and returns "Queen can attack!"') do
    visit('/')
    fill_in('x-start', :with => 1)
    fill_in('y-start', :with => 1)
    fill_in('x-end', :with => 1)
    fill_in('y-end', :with => 3)
    click_button('Attack!')
    expect(page).to have_content('Queen can attack!')
  end

  it('processes the user entry and returns "Queen cannot attack!"') do
    visit('/')
    fill_in('x-start', :with => 1)
    fill_in('y-start', :with => 1)
    fill_in('x-end', :with => 2)
    fill_in('y-end', :with => 4)
    click_button('Attack!')
    expect(page).to have_content('Queen cannot attack!')
  end
end
