

        const newsTable =
        document.getElementById("newsTable");

        const pagination =
        document.getElementById("pagination");

        const searchInput =
        document.getElementById("searchInput");

        const loadingBox =
        document.getElementById("loadingBox");

        const errorBox =
        document.getElementById("errorBox");

        let allNews = [];

        let filteredNews = [];

        let currentPage = 1;

        const rowsPerPage = 10;

        function renderNews(){

            const start =
            (currentPage - 1) * rowsPerPage;

            const end =
            start + rowsPerPage;

            const paginatedNews =
            filteredNews.slice(start, end);

            let output = "";

            paginatedNews.forEach(news => {

                output += `

                    <tr>

                        <td>

                            <div class="news-info">

                                <div class="news-image">

                                    <img
                                    src="https://picsum.photos/300/300?random=${news.id}"
                                    alt="News">

                                </div>

                                <div class="news-title">

                                    ${news.title}

                                </div>

                            </div>

                        </td>

                        <td>
                            ${news.tags.join(", ")}
                        </td>

                        <td>
                            ${news.views}
                        </td>

                        <td>
                            ${news.reactions.likes}
                        </td>

                        <td>
                            ${news.reactions.dislikes}
                        </td>

                        <td>

                            <span class="status published">

                                Published

                            </span>

                        </td>

                    </tr>

                `;

            });

            newsTable.innerHTML = output;

            setupPagination();

        }

        function setupPagination(){

            pagination.innerHTML = "";

            const pageCount =
            Math.ceil(
                filteredNews.length /
                rowsPerPage
            );

            for(let i = 1; i <= pageCount; i++){

                const btn =
                document.createElement("button");

                btn.innerText = i;

                btn.classList.add("page-btn");

                if(i === currentPage){

                    btn.classList.add("active");

                }

                btn.addEventListener(
                    "click",
                    function(){

                        currentPage = i;

                        renderNews();

                    }
                );

                pagination.appendChild(btn);

            }

        }

        async function loadNews(){

            loadingBox.classList.add("active");

            errorBox.classList.remove("active");

            try{

                const response = await fetch(
                    "https://dummyjson.com/posts"
                );

                if(!response.ok){

                    throw new Error(
                        "Failed to fetch news"
                    );

                }

                const data = await response.json();

                allNews = data.posts;

                filteredNews = allNews;

                document.getElementById(
                    "totalNews"
                ).innerHTML =
                allNews.length;

                let tags = [];

                allNews.forEach(news => {

                    tags.push(...news.tags);

                });

                const uniqueTags =
                new Set(tags);

                document.getElementById(
                    "totalTags"
                ).innerHTML =
                uniqueTags.size;

                const avgViews =
                allNews.reduce(
                    (total, news) =>
                    total + news.views,
                    0
                ) / allNews.length;

                document.getElementById(
                    "avgViews"
                ).innerHTML =
                avgViews.toFixed(0);

                const totalLikes =
                allNews.reduce(
                    (total, news) =>
                    total + news.reactions.likes,
                    0
                );

                document.getElementById(
                    "totalLikes"
                ).innerHTML =
                totalLikes;

                renderNews();

                loadingBox.classList.remove("active");

            }catch(error){

                loadingBox.classList.remove("active");

                errorBox.classList.add("active");

                errorBox.innerHTML =
                error.message;

            }

        }

        searchInput.addEventListener(
            "keyup",
            function(){

                const value =
                this.value.toLowerCase();

                filteredNews =
                allNews.filter(news =>

                    news.title
                    .toLowerCase()
                    .includes(value)

                    ||

                    news.body
                    .toLowerCase()
                    .includes(value)

                );

                currentPage = 1;

                renderNews();

            }
        );

        loadNews();