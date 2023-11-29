const express = require('express');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Usar o middleware bodyParser para processar o corpo das solicitações como JSON
app.use(bodyParser.json());

// Array simples para simular um banco de dados
let objetos = [
  { id: 1, nome: 'Objeto 1' },
  { id: 2, nome: 'Objeto 2' },
  // Adicione outros objetos conforme necessário
];

// Rota para criar um novo objeto
app.post('/api/objetos', (req, res) => {
  const novoObjeto = req.body;
  objetos.push(novoObjeto);
  res.status(201).json(novoObjeto);
});

// Rota para obter todos os objetos
app.get('/api/objetos', (req, res) => {
  res.status(200).json(objetos);
});

// Rota para atualizar um objeto existente
app.put('/api/objetos/:id', (req, res) => {
  const id = parseInt(req.params.id);
  const objetoAtualizado = req.body;

  objetos = objetos.map(objeto => (objeto.id === id ? objetoAtualizado : objeto));

  res.status(200).json(objetoAtualizado);
});

// Rota para excluir um objeto
app.delete('/api/objetos/:id', (req, res) => {
  const id = parseInt(req.params.id);
  objetos = objetos.filter(objeto => objeto.id !== id);
  res.status(204).send();
});

// Inicie o servidor
app.listen(port, () => {
  console.log(`Servidor está rodando em http://localhost:${port}`);
});