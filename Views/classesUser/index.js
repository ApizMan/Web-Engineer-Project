function setDeleteAction() {
    if(confirm("Are you sure want to delete these rows?")) {
        document.dashboard.action = "delete.php";
        document.dashboard.submit();
    }
}