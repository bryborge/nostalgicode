require 'sinatra'
require 'sinatra/reloader'
require './lib/queen_attack'
also_reload 'lib/**/*.rb'

get '/' do
  erb :index
end

get '/attack' do
  @x_start = params.fetch('x-start').to_i
  @y_start = params.fetch('y-start').to_i
  @x_end = params.fetch('x-end').to_i
  @y_end = params.fetch('y-end').to_i
  @result = [@x_start, @y_start].queen_attack?([@x_end, @y_end])
  erb :attack
end
