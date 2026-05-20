const userTable = document.getElementById("userTable");
const pagination = document.getElementById("pagination");
const searchInput = document.getElementById("searchInput");
const loadingBox = document.getElementById("loadingBox");
const errorBox = document.getElementById("errorBox");
let allUsers = [];
let filteredUsers = [];
let currentPage = 1;
const rowsPerPage = 10;
function getInitials(name){
    const parts = name.split(" ");
    let initials = parts[0].charAt(0);
    if(parts.length > 1){
        initials += parts[1].charAt(0);
    }
    return initials.toUpperCase();
}
function renderUsers(){

    const start =
    (currentPage - 1) * rowsPerPage;

    const end =
    start + rowsPerPage;

    const paginatedUsers =
    filteredUsers.slice(start, end);

    let output = "";

    paginatedUsers.forEach(user => {

        output += `
        <tr>

            <td>
                <div class="user-info">
                    <div class="user-logo">
                        ${getInitials(
                            user.firstName +
                            " " +
                            user.lastName
                        )}
                    </div>

                    <span>
                        ${user.firstName}
                        ${user.lastName}
                    </span>
                </div>
            </td>

            <td>${user.email}</td>
            <td>${user.phone}</td>
            <td>${user.gender}</td>
            <td>${user.address.city}</td>
            <td>${user.company.name}</td>

            <td>
                <span class="status active-status">
                    Active
                </span>
            </td>

            <td>
                <div class="action-buttons">

                    <button
                    class="view-btn"
                    onclick="viewUser(${user.id})">
                        View
                    </button>

                    <button
                    class="edit-btn"
                    onclick="editUser(${user.id})">
                        Edit
                    </button>

                    <button
                    class="delete-btn"
                    onclick="deleteUser(${user.id})">
                        Delete
                    </button>

                </div>
            </td>

        </tr>`;
    });

    userTable.innerHTML = output;

    setupPagination();
}
function setupPagination(){
    pagination.innerHTML = "";
    const pageCount = Math.ceil(filteredUsers.length / rowsPerPage);
    for(let i = 1; i <= pageCount; i++){
        const btn = document.createElement("button");
        btn.innerText = i;
        btn.classList.add("page-btn");
        if(i === currentPage){
            btn.classList.add("active");
        }
        btn.addEventListener("click",function(){
            currentPage = i;
            renderUsers();
            }
        );
        pagination.appendChild(btn);
    }
}
async function loadUsers(){
    loadingBox.classList.add("active");
    errorBox.classList.remove("active");
    try{
        const response = await fetch(
            "https://dummyjson.com/users"
        );
        if(!response.ok){
            throw new Error(
                "Failed to fetch users"
            );
        }
        const data = await response.json();
        allUsers = data.users;
        filteredUsers = allUsers;
        document.getElementById(
            "totalUsers"
        ).innerHTML =
        allUsers.length;
        document.getElementById(
            "maleUsers"
        ).innerHTML =
        allUsers.filter(
            user =>
            user.gender === "male"
        ).length;
        document.getElementById(
            "femaleUsers"
        ).innerHTML =
        allUsers.filter(
            user =>
            user.gender === "female"
        ).length;
        const uniqueCountries =
        new Set(
            allUsers.map(
                user =>
                user.address.state
            )
        );
        document.getElementById(
            "countries"
        ).innerHTML =
        uniqueCountries.size;
        renderUsers();
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
        filteredUsers =
        allUsers.filter(user =>
            user.firstName
            .toLowerCase()
            .includes(value)
            ||
            user.lastName
            .toLowerCase()
            .includes(value)
            ||
            user.email
            .toLowerCase()
            .includes(value)
        );
        currentPage = 1;
        renderUsers();
    }
);
loadUsers();

let selectedUserId = null;


function viewUser(id){

    const user =
    filteredUsers.find(
        user => user.id === id
    );

    if(!user) return;

    selectedUserId = id;

    document.getElementById(
        "userModalTitle"
    ).innerText = "View User";

    fillUserForm(user);

    disableUserFields(true);

    document.getElementById(
        "saveUserBtn"
    ).style.display = "none";

    document.getElementById(
        "userModal"
    ).style.display = "flex";
}



function editUser(id){

    const user =
    filteredUsers.find(
        user => user.id === id
    );

    if(!user) return;

    selectedUserId = id;

    document.getElementById(
        "userModalTitle"
    ).innerText = "Edit User";

    fillUserForm(user);

    disableUserFields(false);

    document.getElementById(
        "saveUserBtn"
    ).style.display = "block";

    document.getElementById(
        "userModal"
    ).style.display = "flex";
}



function fillUserForm(user){

    document.getElementById(
        "userFirstName"
    ).value = user.firstName || "";

    document.getElementById(
        "userLastName"
    ).value = user.lastName || "";

    document.getElementById(
        "userEmail"
    ).value = user.email || "";

    document.getElementById(
        "userPhone"
    ).value = user.phone || "";

    document.getElementById(
        "userGender"
    ).value = user.gender || "";

    document.getElementById(
        "userCity"
    ).value =
    user.address.city || "";

    document.getElementById(
        "userCompany"
    ).value =
    user.company.name || "";
}



function disableUserFields(status){

    const fields = [
        "userFirstName",
        "userLastName",
        "userEmail",
        "userPhone",
        "userGender",
        "userCity",
        "userCompany"
    ];

    fields.forEach(field => {

        document.getElementById(
            field
        ).disabled = status;

    });
}



function saveUser(){

    const user =
    filteredUsers.find(
        user => user.id === selectedUserId
    );

    if(!user) return;

    user.firstName =
    document.getElementById(
        "userFirstName"
    ).value;

    user.lastName =
    document.getElementById(
        "userLastName"
    ).value;

    user.email =
    document.getElementById(
        "userEmail"
    ).value;

    user.phone =
    document.getElementById(
        "userPhone"
    ).value;

    user.gender =
    document.getElementById(
        "userGender"
    ).value;

    user.address.city =
    document.getElementById(
        "userCity"
    ).value;

    user.company.name =
    document.getElementById(
        "userCompany"
    ).value;

    renderUsers();

    closeUserModal();
}



function deleteUser(id){

    const confirmDelete =
    confirm(
        "Are you sure delete user?"
    );

    if(!confirmDelete) return;

    filteredUsers =
    filteredUsers.filter(
        user => user.id !== id
    );

    renderUsers();
}



function closeUserModal(){

    document.getElementById(
        "userModal"
    ).style.display = "none";
}