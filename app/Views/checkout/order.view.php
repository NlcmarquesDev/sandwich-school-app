<?php
include(BASE_PATH . 'app/Views/partials/header.php');
include(BASE_PATH . 'app/Views/partials/navbar.php');

?>

<h1>Orders</h1>
<div class="modal modal-sheet position-static d-block  p-4 py-md-5" tabindex="-1" role="dialog" id="modalChoice">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0">Do you want another sandwish?</h5>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <a href="/broodjes_app/brood?new=1" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end"><strong>Yes, thanks</strong></a>
                <a href="/broodjes_app/order" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0">No, thanks</a>
            </div>
        </div>
    </div>
</div>
<?php
include(BASE_PATH . 'app/Views/partials/footer.php');
?>