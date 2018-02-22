class ruby {
  exec { "Add ruby2.3 repository":
    command => "sudo apt-add-repository ppa:brightbox/ruby-ng",
    path    => "/usr/bin/"
  }

  exec { "Update package manager":
    command => "sudo apt-get update",
    path    => "/usr/bin/",
    timeout => 0,
    require => Exec["Add ruby2.3 repository"]
  }

  package { "ruby2.3":
    ensure  => "installed",
    require => Exec["Update package manager"]
  }

  package { "ruby2.3-dev":
    ensure  => "installed",
    require => Package["ruby2.3"]
  }
}
