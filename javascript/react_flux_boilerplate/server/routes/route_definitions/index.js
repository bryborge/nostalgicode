module.exports = {
    method: 'GET',
    path: '/',
    handler: async (request, h) => {
        const fs = require('fs');
        let dir = __dirname + '/../../assets/client/index.html';
        let index = fs.readFileSync(dir);

        const response = h.response(index);
        response.type('text/html');

        return response;
    }
}
