require 'sinatra'
require 'sinatra/reloader'
require './lib/triangle'
also_reload 'lib/**/*.rb'

get '/' do
  erb :index
end

get '/triangle' do
  @x = params.fetch('side-x').to_i
  @y = params.fetch('side-y').to_i
  @z = params.fetch('side-z').to_i
  @triangle = Triangle.new(@x, @y, @z)
  @triangle_type = @triangle.type

  erb :triangle
end
