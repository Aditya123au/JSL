if(window.location.pathname.endsWith("shop-all.php")){
    const loadingBox = document.getElementById("loadingBox");
    const errorBox = document.getElementById("errorBox");
    const productGrid = document.getElementById("productGrid");
    async function fetchProducts(){
        const response = await fetch("https://dummyjson.com/products");
        if(!response.ok){
            throw new Error("Failed to fetch products");
        }
        const data = await response.json();
        let output = "";
        data.products.slice(0,28).forEach(product => {
            output += `
                <div class="product-card">
                    <div class="product-image">
                        <img src="${product.thumbnail}" alt="${product.title}">
                    </div>
                    <div class="product-content">
                        <h3>
                            ${product.title}
                        </h3>
                        <p>
                            ${product.description.substring(0,80)}...
                        </p>
                        <div class="product-bottom">
                            <div class="price">
                                $${product.price}
                            </div>
                            <button class="buy-btn">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });
        productGrid.innerHTML = output;
    }
    async function loadAllData(){
        loadingBox.classList.add("active");
        errorBox.classList.remove("active");
        try{
            await Promise.all([
                fetchProducts()
            ]);
            loadingBox.classList.remove("active");
        }catch(error){
            loadingBox.classList.remove("active");
            errorBox.classList.add("active");
            errorBox.innerHTML =error.message;
        }
    }
    loadAllData();
}
else if(window.location.pathname.endsWith("news-weather.php")){
    const loadingBox = document.getElementById("loadingBox");
    const errorBox = document.getElementById("errorBox");
    const weatherContainer = document.getElementById("weatherContainer");
    const newsGrid = document.getElementById("newsGrid");
    async function fetchWeather(){
        const response = await fetch("https://api.open-meteo.com/v1/forecast?latitude=28.6139&longitude=77.2090&current_weather=true");
        if(!response.ok){
            throw new Error( "Failed to fetch weather");
        }
        const data = await response.json();
        weatherContainer.innerHTML = `
        <div class="weather-left">
            <h2>
                ${data.current_weather.temperature}°C
            </h2>
            <p>
                Delhi, India
            </p>
        </div>
        <div class="weather-right">
            <i class="ri-sun-foggy-line"></i>
            <h3>
                Live Weather
            </h3>
        </div>`;
    }
    const loadMoreBtn = document.getElementById("loadMoreBtn");

    let allPosts = [];
    let visibleCount = 8;

    async function fetchNews() {
        try {
            const response = await fetch("https://dummyjson.com/posts");

            if (!response.ok) {
                throw new Error("Failed to fetch news");
            }

            const data = await response.json();

            allPosts = data.posts;

            renderNews();
        } catch (error) {
            console.error(error);
            newsGrid.innerHTML = `<p>Failed to load news</p>`;
        }
    }

    function renderNews() {
        let output = "";

        allPosts.slice(0, visibleCount).forEach(post => {
            output += `
                <div class="news-card">
                    <div class="news-image">
                        <img src="https://picsum.photos/500/300?random=${post.id}" alt="News ${post.id}">
                    </div>
                    <div class="news-content">
                        <h3>
                            ${post.title}
                        </h3>
                        <p>
                            ${post.body.substring(0,100)}...
                        </p>
                        <button class="news-btn">
                            Read More
                        </button>
                    </div>
                </div>
            `;
        });

        newsGrid.innerHTML = output;
        if (visibleCount >= allPosts.length) {
            loadMoreBtn.style.display = "none";
        } else {
            loadMoreBtn.style.display = "inline-block";
        }
    }

    // Load More Click
    loadMoreBtn.addEventListener("click", () => {
        visibleCount += 4;
        renderNews();
    });
    async function loadAllData(){
        loadingBox.classList.add("active");
        errorBox.classList.remove("active");
        try{
            await Promise.all([
                fetchWeather(),
                fetchNews()
            ]);
            loadingBox.classList.remove("active");
        }catch(error){
            loadingBox.classList.remove("active");
            errorBox.classList.add("active");
            errorBox.innerHTML =error.message;
        }
    }
    loadAllData();
}