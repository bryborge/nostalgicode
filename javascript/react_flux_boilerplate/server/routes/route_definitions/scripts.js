module.exports = {
    method: 'GET',
    path: '/js/{script}',
    handler: async (request, h) => {
        const fs = require('fs');
        let dir = __dirname + '/../../assets/client/js/' + request.params.script;
        let file = fs.readFileSync(dir);

        const response = h.response(file);
        response.type('application/javascript');

        return response;
    }
}
