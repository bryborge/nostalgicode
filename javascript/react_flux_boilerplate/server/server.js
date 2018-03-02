const Hapi = require('hapi');
const path = require('path');
const fs = require('fs');

module.exports = new class Server {
  constructor() {
    this.server = new Hapi.Server({ port: 1337, host: 'localhost' });

    this.server.register(require('./routes/router.js'), (err) => {
      if (err) {
        return console.error('routes error: ', err);
      }
    });
  } // constructor

  start() {
    return this.server.start((err) => {
      if (err) {
        return console.error('start error: ', err);
      }

      console.log('Server started at', this.server.info.uri)
      return this.server;
    });
  } // start

  stop(callback) {
    this.server.stop(callback)
  } // stop
}
