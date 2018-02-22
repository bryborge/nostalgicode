class django {
  $dependencies = ['curl', 'git', 'python-dev', 'python-pip', 'mysql-server']

  exec { 'update-apt':
    command => 'sudo apt-get update',
    path    => '/usr/bin/',
    timeout => 0
  }

  package { $dependencies:
    ensure  => 'installed',
    require => Exec['update-apt']
  }

  package { ['python', 'django']:
    ensure   => 'present',
    provider => 'pip',
    require  => Package[$dependencies]
  }
}
