const productTable = document.getElementById("productTable");
const pagination = document.getElementById("pagination");
const searchInput = document.getElementById("searchInput");
const loadingBox = document.getElementById("loadingBox");
const errorBox = document.getElementById("errorBox");
let allProducts = [];
let filteredProducts = [];
let currentPage = 1;
const rowsPerPage = 5;
function renderProducts() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    const paginatedProducts = filteredProducts.slice(start, end);

    let output = "";

    paginatedProducts.forEach(product => {

        output += `
        <tr>
            <td>
                <div class="product-info">
                    <div class="product-image">
                        <img src="${product.thumbnail}" alt="${product.title}">
                    </div>
                    <span>${product.title}</span>
                </div>
            </td>

            <td>${product.category}</td>
            <td>${product.brand}</td>
            <td>$${product.price}</td>
            <td>${product.rating}</td>
            <td>${product.stock}</td>

            <td>
                <span class="stock in-stock">
                    In Stock
                </span>
            </td>

            <td>
                <div class="action-buttons">
                    <button class="view-btn"
                        onclick="viewProduct(${product.id})">
                        View
                    </button>

                    <button class="edit-btn"
                        onclick="editProduct(${product.id})">
                        Edit
                    </button>

                    <button class="delete-btn"
                        onclick="deleteProduct(${product.id})">
                        Delete
                    </button>
                </div>
            </td>
        </tr>`;
    });

    productTable.innerHTML = output;

    setupPagination();
}
function setupPagination(){
    pagination.innerHTML = "";
    const pageCount = Math.ceil( filteredProducts.length / rowsPerPage);
    for(let i = 1; i <= pageCount; i++){
        const btn = document.createElement("button");
        btn.innerText = i;
        btn.classList.add("page-btn");
        if(i === currentPage){
            btn.classList.add("active");
        }
        btn.addEventListener("click",function(){
            currentPage = i;
            renderProducts();
        });
        pagination.appendChild(btn);
    }
}
async function loadProducts(){
    loadingBox.classList.add("active");
    errorBox.classList.remove("active");
    try{
        const response = await fetch("https://dummyjson.com/products");
        if(!response.ok){
            throw new Error("Failed to fetch products");
        }
        const data = await response.json();
        allProducts = data.products;
        filteredProducts = allProducts;
        document.getElementById("totalProducts").innerHTML = allProducts.length;
        const categories = new Set(allProducts.map(product =>product.category));
        document.getElementById("totalCategories").innerHTML = categories.size;
        const avgPrice = allProducts.reduce((total, product) => total + product.price,0) / allProducts.length;
        document.getElementById("avgPrice").innerHTML ="$" + avgPrice.toFixed(0);
        document.getElementById("stockProducts").innerHTML =allProducts.filter(product =>product.stock > 0).length;
        renderProducts();
        loadingBox.classList.remove("active");
    }catch(error){
        loadingBox.classList.remove("active");
        errorBox.classList.add("active");
        errorBox.innerHTML = error.message;
    }
}
searchInput.addEventListener("keyup",function(){
    const value = this.value.toLowerCase();
    filteredProducts = allProducts.filter(product =>product.title.toLowerCase().includes(value)||product.category.toLowerCase().includes(value)||product.brand.toLowerCase().includes(value));
    currentPage = 1;
    renderProducts();
});
loadProducts();
let selectedProductId = null;

function viewProduct(id){

    const product =
    filteredProducts.find(p => p.id === id);

    if(!product) return;

    document.getElementById("modalTitle").innerText =
    "View Product";

    fillForm(product);

    disableFields(true);

    document.getElementById("saveBtn").style.display =
    "none";

    document.getElementById("productModal").style.display =
    "flex";
}


function editProduct(id){

    const product =
    filteredProducts.find(p => p.id === id);

    if(!product) return;

    selectedProductId = id;

    document.getElementById("modalTitle").innerText =
    "Edit Product";

    fillForm(product);

    disableFields(false);

    document.getElementById("saveBtn").style.display =
    "block";

    document.getElementById("productModal").style.display =
    "flex";
}


function fillForm(product){

    document.getElementById("productTitle").value =
    product.title || "";

    document.getElementById("productCategory").value =
    product.category || "";

    document.getElementById("productBrand").value =
    product.brand || "";

    document.getElementById("productPrice").value =
    product.price || "";

    document.getElementById("productRating").value =
    product.rating || "";

    document.getElementById("productStock").value =
    product.stock || "";

    document.getElementById("productThumbnail").value =
    product.thumbnail || "";
}


function disableFields(status){

    const fields = [
        "productTitle",
        "productCategory",
        "productBrand",
        "productPrice",
        "productRating",
        "productStock",
        "productThumbnail"
    ];

    fields.forEach(id => {
        document.getElementById(id).disabled =
        status;
    });
}


function saveProduct(){

    const product =
    filteredProducts.find(
        p => p.id === selectedProductId
    );

    if(!product) return;

    product.title =
    document.getElementById("productTitle").value;

    product.category =
    document.getElementById("productCategory").value;

    product.brand =
    document.getElementById("productBrand").value;

    product.price =
    document.getElementById("productPrice").value;

    product.rating =
    document.getElementById("productRating").value;

    product.stock =
    document.getElementById("productStock").value;

    product.thumbnail =
    document.getElementById("productThumbnail").value;

    renderProducts();

    closeModal();
}


function deleteProduct(id){

    const confirmDelete =
    confirm("Are you sure delete product?");

    if(!confirmDelete) return;

    filteredProducts =
    filteredProducts.filter(
        product => product.id !== id
    );

    renderProducts();
}


function closeModal(){

    document.getElementById("productModal").style.display =
    "none";
}