'use strict';

const Hapi = require('hapi');
const router = require('./routes/router.js');

const DEFAULT_HOST = 'localhost';
const DEFAULT_PORT = 1337;

module.exports = new class Server {
    constructor() {
        this.server = Hapi.server({
            host: DEFAULT_HOST,
            port: DEFAULT_PORT,
            app: {}
        });
    }

    async start() {
        try {
            await this.server.register(router);
            await this.server.start();
            console.log(`Hapi server running at ${this.server.info.uri}`);
        } catch (err) {
            console.error("Hapi error starting server", err);
        }
    }
}
