#!/usr/bin/env bash

touch .bash_aliases

echo 'alias sing="ruby app.rb -o 0.0.0.0 -p 3000"' >> .bash_aliases
echo 'alias ride="rails s -b 0.0.0.0"' >> .bash_aliases

touch .rspec

echo '--color' >> .rspec
