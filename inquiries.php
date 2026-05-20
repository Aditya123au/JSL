<?php

include('include/config.php');

$query =
"SELECT * FROM contact_inquiries
ORDER BY id DESC";

$result =
mysqli_query(
    $conn,
    $query
);

?>

<?php include('include/sidebar.php'); ?>
<div class="dashboard-main">
    <?php include('include/topbar.php'); ?>
<style><?php include('css/inquiries.css'); ?></style>
<div class="page-header">
    <h1 class="page-title">
        Contact Inquiries
    </h1>
    <div class="search-box-table">
        <i class="ri-search-line"></i>
        <input type="text" id="searchInput" placeholder="Search inquiry">
    </div>
    <div class="table-card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>
                            User
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="inquiryTable">
                    <?php
                        while(
                            $row =
                            mysqli_fetch_assoc(
                                $result
                            )
                        ){
                    ?>
                    <tr>
                        <td>
                            <div
                            class="user-info">
                                <div class="user-logo">
                                    <?= strtoupper( substr( $row['full_name'],0,2)) ?>
                                </div>
                                <span>
                                    <?= $row['full_name'] ?>
                                </span>
                            </div>
                        </td>
                        <td>
                            <?= $row['email'] ?>
                        </td>
                        <td>
                            <?=
                            $row['phone']
                            ?>
                        </td>

                        <td>
                            <?=
                            date("d M Y",strtotime($row['created_at']))
                            ?>
                        </td>
                        <td>
                            <span class="status">
                                Active
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="view-btn" onclick=" openModal(`<?= htmlspecialchars($row['full_name']) ?>`,`<?= htmlspecialchars($row['email']) ?>`,`<?= htmlspecialchars($row['phone']) ?>`,`<?= htmlspecialchars($row['message']) ?>`,`<?= htmlspecialchars($row['created_at']) ?>`)">
                                    <i class="ri-eye-line"></i>
                                </button>
                                <button class="delete-btn" onclick="deleteInquiry(<?= $row['id'] ?>)">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="inquiryModal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">
                ×
            </span>
            <h2>
                Inquiry Details
            </h2>
            <div id="modalBody"></div>
        </div>
    </div>
</div>
<script>
    const searchInput = document.getElementById("searchInput");

    searchInput.addEventListener("keyup", function () {

        let filter = this.value.toLowerCase();

        let rows = document.querySelectorAll("#inquiryTable tr");

        rows.forEach(row => {

            let text = row.innerText.toLowerCase();

            row.style.display = text.includes(filter)
                ? ""
                : "none";

        });

    });

    function openModal(
        name,
        email,
        phone,
        message,
        date
    ) {

        document.getElementById("modalBody").innerHTML = `
            <div class="detail-item">
                <strong>Name</strong>
                ${name}
            </div>

            <div class="detail-item">
                <strong>Email</strong>
                ${email}
            </div>

            <div class="detail-item">
                <strong>Phone</strong>
                ${phone}
            </div>

            <div class="detail-item">
                <strong>Message</strong>
                ${message}
            </div>

            <div class="detail-item">
                <strong>Date</strong>
                ${date}
            </div>
        `;

        document.getElementById("inquiryModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("inquiryModal").style.display = "none";
    }

    function deleteInquiry(id) {

        if (!confirm("Delete inquiry?")) {
            return;
        }

        fetch("ajax/delete-inquiry.php?id=" + id)
            .then(res => res.json())
            .then(data => {

                if (data.status === "success") {
                    location.reload();
                } else {
                    alert(data.message);
                }

            });

    }
</script>

<?php include('include/footer.php'); ?>