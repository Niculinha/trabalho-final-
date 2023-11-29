function adicionarItem() {
    const novoItem = document.createElement("li");
    novoItem.innerText = document.novo_item.valor_item.value;

    const novoItemExcluir = document.createElement("img");
    novoItemExcluir.src= "imagens/delete.png";
    novoItemExcluir.style.width = "5px";
    novoItemExcluir.onclick = function () {
        const item = this.parentNode;
        item.parentNode.removeChild(item);
    }
    novoItem.appendChild(novoItemExcluir);

    const minhalista = document.getElementsByTagName("ul")[0];
    minhalista.appendChild(novoItem);
}