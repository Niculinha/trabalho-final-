document.getElementById('form-busca').addEventListener('submit', function (e) {
    const inputBusca = document.getElementById('busca');
    const termoBusca = inputBusca.value.toLowerCase();
  
    if (termoBusca.includes('lasanha')) {
      // Se o termo de busca contém "lasanha", redirecione para 'receitasalgadas.html'
      window.location.href = 'receitasalgadas.html';
    } else if (termoBusca.includes('bolinho de chuva')) {
      // Se o termo de busca contém "bolinho de chuva", redirecione para 'receitadoces.html'
      window.location.href = 'receitadoces.html';
    } else {
      
      e.preventDefault();
      alert('Termo de busca não reconhecido.');
    }
  });