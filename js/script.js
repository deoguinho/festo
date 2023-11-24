const productsData = [
    {
        title: "Anuncio 1",
        image: "assets/sitioexemplo.jpg",
        description: "Prestador Fulano"
    },
    {
        title: "Anuncio 2",
        image: "assets/sitioexemplo.jpg",
        description: "Prestador Ciclano"
    },
    {
        title: "Anuncio 3",
        image: "assets/sitioexemplo.jpg",
        description: "Prestador Kelano"
    },
    {
        title: "Anuncio 4",
        image: "assets/sitioexemplo.jpg",
        description: "Prestador Banano"
    },
    {
        title: "Anuncio 5",
        image: "assets/sitioexemplo.jpg",
        description: "Prestador Ciano"
    },
    {
        title: "Anuncio 6",
        image: "assets/sitioexemplo.jpg",
        description: "Prestador Lezano"
    }
];

function renderProducts() {
    const productContainer = document.getElementById("product-container");

    productsData.forEach(product => {
        const productDiv = document.createElement("div");
        productDiv.classList.add("product");

        const productImage = document.createElement("img");
        productImage.src = product.image;
        productDiv.appendChild(productImage);

        const productTitle = document.createElement("div");
        productTitle.classList.add("product-title");
        productTitle.textContent = product.title;
        productDiv.appendChild(productTitle);

        const productDescription = document.createElement("div");
        productDescription.classList.add("product-description");
        productDescription.textContent = product.description;
        productDiv.appendChild(productDescription);

        productContainer.appendChild(productDiv);
    });
}
renderProducts();

