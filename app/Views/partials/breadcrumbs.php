<div class=" mb-5 mt-2">
    <nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center bg-body-tertiary rounded-3 p-3">
        <ol class="breadcrumb breadcrumb-chevron m-0  ">
            <li class="breadcrumb-item">
                <a class="link-body-emphasis" href="/broodjes_app/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                    </svg>
                    <span class="visually-hidden">Home</span>
                </a>
            </li>
            <?php if (isset($_SESSION['breadcrumbs']) && $_SESSION['breadcrumbs']['brood']['page']) : ?>
                <li class="breadcrumb-item <?= $_SESSION['breadcrumbs']['brood']['class'] ? 'fw-semibold' : '' ?>">
                    <a class="link-body-emphasis  text-decoration-none" href="/broodjes_app/brood">Brood</a>
                </li>
            <?php endif ?>
            <?php if ($_SESSION['breadcrumbs']['beleg']['page']) : ?>
                <li class="breadcrumb-item <?= $_SESSION['breadcrumbs']['beleg']['class'] ? 'fw-semibold' : '' ?>" aria-current="page">
                    Beleg
                </li>
            <?php endif ?>
            <?php if ($_SESSION['breadcrumbs']['checkout']['page']) : ?>
                <li class="breadcrumb-item <?= $_SESSION['breadcrumbs']['checkout']['class'] ? 'fw-semibold' : '' ?> " aria-current="page">
                    Chekout
                </li>
            <?php endif ?>
        </ol>
        <div id="clock" class="fw-bold"></div>
    </nav>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const timeString = `${hours}:${minutes}:${seconds}`;

        document.getElementById('clock').textContent = timeString;
    }
    updateClock();
    setInterval(updateClock, 1000);
</script>