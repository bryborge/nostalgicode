require 'sinatra'
require 'sinatra/reloader'
require './lib/ping_pong.rb'
also_reload 'lib/**/*.rb'

get '/' do
  erb :index
end

get '/ping-pong' do
  @count = params.fetch('count').to_i
  @count = @count.ping_pong()
  erb :ping_pong
end
