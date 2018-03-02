'use strict';

const fs = require('fs');

const register = async (server, options) => {
    let files = fs.readdirSync(__dirname + '/route_definitions');

    files.forEach((filename) => {
        if (~filename.indexOf('.js')) {
            let route = require(__dirname + '/route_definitions/' + filename);

            console.log('Initialize route:', route.path);
            server.route(route);
        }
    });
}

const myRouter = {
    name: "myRouterPlugin",
    version: "1.0.0",
    register
}

module.exports = myRouter;
