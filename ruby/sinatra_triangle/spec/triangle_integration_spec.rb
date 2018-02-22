require 'capybara/rspec'
require './app'

Capybara.app = Sinatra::Application

set(:show_exceptions, false)

describe('the triangle path', {:type => :feature}) do
  it('processes the lengths of each side of an equilateral triangle') do
    visit('/')
    fill_in('side-x', :with => 3)
    fill_in('side-y', :with => 3)
    fill_in('side-z', :with => 3)
    click_button('Calculate')
    expect(page).to have_content('equilateral triangle')
  end

  it('processes the lengths of each side of an isosceles triangle') do
    visit('/')
    fill_in('side-x', :with => 3)
    fill_in('side-y', :with => 5)
    fill_in('side-z', :with => 5)
    click_button('Calculate')
    expect(page).to have_content('isosceles triangle')
  end

  it('processes the lengths of each side of a scalene triangle') do
    visit('/')
    fill_in('side-x', :with => 3)
    fill_in('side-y', :with => 4)
    fill_in('side-z', :with => 5)
    click_button('Calculate')
    expect(page).to have_content('scalene triangle')
  end

  it('processes the lengths of each side of a false triangle') do
    visit('/')
    fill_in('side-x', :with => 3)
    fill_in('side-y', :with => 3)
    fill_in('side-z', :with => 17)
    click_button('Calculate')
    expect(page).to have_content('invalid triangle')
  end
end
