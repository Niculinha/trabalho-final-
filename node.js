const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;


app.use(bodyParser.json());


let objetos = [
  { id: 1, nome: 'Objeto 1' },
  { id: 2, nome: 'Objeto 2' },
  
];


app.post('/api/objetos', (req, res) => {
  const novoObjeto = req.body;
  objetos.push(novoObjeto);
  res.status(201).json(novoObjeto);
});


app.get('/api/objetos', (req, res) => {
  res.status(200).json(objetos);
});


app.put('/api/objetos/:id', (req, res) => {
  const id = parseInt(req.params.id);
  const objetoAtualizado = req.body;

  objetos = objetos.map(objeto => (objeto.id === id ? objetoAtualizado : objeto));

  res.status(200).json(objetoAtualizado);
});


app.delete('/api/objetos/:id', (req, res) => {
  const id = parseInt(req.params.id);
  objetos = objetos.filter(objeto => objeto.id !== id);
  res.status(204).send();
});


app.listen(port, () => {
  console.log(`Servidor está rodando em http://localhost:${port}`);
});
