require 'capybara/rspec'
require './app'

Capybara.app = Sinatra::Application

set(:show_exceptions, false)

describe('the ping pong path', {:type => :feature}) do
  it('processes the user entry and returns a ping-ponged list') do
    visit('/')
    fill_in('count', :with => '3')
    click_button('Submit')
    expect(page).to have_content('0')
    expect(page).to have_content('1')
    expect(page).to have_content('2')
    expect(page).to have_content('ping')
  end
end
