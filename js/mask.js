function mascaraDeTelefone(telefone) {
    const textoAtual = telefone.value; 
    console.log(textoAtual)
    let textoAjustado = textoAtual.replace(/[^\d]/gi, '');
    console.log(textoAjustado)
    const isTelefone = textoAjustado.length === 10;

    if (isTelefone) {
        const parte1 = textoAjustado.slice(0, 2);
        const parte2 = textoAjustado.slice(2, 6);
        const parte3 = textoAjustado.slice(6, 10);
        textoAjustado = `(${parte1}) ${parte2}-${parte3}`
    } else {
        const parte1 = textoAjustado.slice(0, 2);
        const parte2 = textoAjustado.slice(2, 7);
        const parte3 = textoAjustado.slice(7, 11);
        textoAjustado = `(${parte1}) ${parte2}-${parte3}`
    }

    telefone.value = textoAjustado;
}
