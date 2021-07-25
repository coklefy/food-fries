
	var session = document.getElementById("role").value;
	console.log(session);
	var cart= [];
	var Item = function (id_pietanza,id_ristorante,id_cliente,immagine, nome_pietanza, quantita, prezzo){
		this.id_pietanza=id_pietanza;
		this.immagine=immagine;
		this.nome_pietanza=nome_pietanza;
		this.quantita=quantita;
		this.prezzo=prezzo;
		this.id_ristorante=id_ristorante;
		this.id_cliente=id_cliente;
	}

	/* aggiungi elementi al carello*/
	function addItemToCart(id_pietanza,id_ristorante,id_cliente,immagine,nome_pietanza,quantita,prezzo){
		for(var i in cart) {
			if(cart[i].id_pietanza === id_pietanza){
				cart[i].quantita ++;
				saveCart(id_cliente);
				return;
			}
		}
		var item = new this.Item(id_pietanza,id_ristorante,id_cliente,immagine,nome_pietanza,quantita,prezzo);
		cart.push(item);	
		saveCart(id_cliente);
	}



/* rimuovi un elemento dal  carello*/
	function removeItemFromCart(id_pietanza,id_cliente){ 	
		for ( var i in cart ) {
			if (cart[i].id_pietanza === id_pietanza) {
				cart[i].quantita --;
				if (cart[i].quantita === 0) {
					cart.splice(i,1);
				}
				break;
			}
			
		}
		saveCart(id_cliente);
	}
	
	
	/* riumuovi tutti gli elementi di un elemento dal  carello*/
	function removeItemFromCartAll(id_pietanza,id_cliente) {
		for ( var i in cart ) {
			if (cart[i].id_pietanza === id_pietanza) {
				cart.splice(i,1);
				break;
			}
		}
		saveCart(id_cliente);
	}	
	


	/* svuota  carello*/
	function clearCart(id_cliente) {
		cart= [];
		saveCart(id_cliente);		
	}

	
	/* numero di  elementi nel carello*/
	function countCart() {
		var totaleCount = 0;
		for (var i in cart){
			totaleCount += cart[i].quantita;
		}
		return totaleCount;
	}
	

	
	/* prezzo totale carello*/
	function totalCart() {
		var totalCost=0;
		for (var i in cart ){
			var prezzo=cart[i].prezzo * cart[i].quantita;
			totalCost += prezzo;
		}
		return totalCost.toFixed(2);
	}
	
	/* ritorna la lista del  carello*/
	function listCart() {
		var cartCopy= [];
		for (var i in cart ) {
			var item = cart[i];
			var itemCopy = {};
			for ( var p in item ) {
				itemCopy[p] = item[p];
			}
			cartCopy.push(itemCopy);
		}
		return cartCopy;
	}

	/* salva il carello*/
	function saveCart(name) {
		localStorage.setItem(name, JSON.stringify(cart));
	
	}
	
	
	/* carica carello salvato precedentemente*/
	function loadCart() {
		
	
		cart = JSON.parse(localStorage.getItem(session));
		if( cart === null){
			cart= [];
		}
	
	}
	loadCart();
	
		