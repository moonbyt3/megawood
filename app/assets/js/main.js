window.onload = function(){

    // MODAL MORE CONTENT
	var modal = document.getElementById('article-more-content');

	// Get the button that opens the modal
	var btn = document.getElementById("more-button");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal 
	btn.onclick = function() {
    	modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
    	modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
    	if (event.target == modal) {
        	modal.style.display = "none";
    	}
    }
    
    // MODAL PRODUCT ON CLICK
    var product = document.getElementsByClassName('work-item');
    var modalProduct = document.getElementById('modal-product');
    
    var foo = function(){
        var src = this.children[0].children[0].src;
        var source = src.replace(
            "/thumbs/", "/fulls/"
        )
        
       modalProduct.innerHTML = `
                                <div class="product-holder">
                                    <img src=${source}>
                                    <i class="fas fa-times closer" style="cursor: pointer; display: block;" onclick="console.log(this)"></i>
                                </div>
                                
       `;
        modalProduct.style.display = 'block';

        let closeButton = document.getElementsByClassName('closer')[0];
        closeButton.onclick = function() {
            modalProduct.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modalProduct) {
                modalProduct.style.display = "none";
            }
        }
    }

    for (let i = 0; i < product.length; i++){
        product[i].addEventListener('click', foo, false);
    }
    
}