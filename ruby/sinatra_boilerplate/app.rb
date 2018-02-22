require('sinatra')
require('sinatra/reloader')
also_reload('lib/**/*.rb')
# require('./lib/my_app')

get('/') do
  erb(:index)
end
