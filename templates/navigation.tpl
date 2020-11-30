
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            <img src="../img/student-portal-logo.png" width="auto" height="50" class="d-inline-block" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarItems" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarItems">
            <div class="navbar-nav ml-auto align-items-middle">
            {if $smarty.session.user.role == 'A'}
                <a class="nav-item nav-link _redirect" href="#" data-url="createStudent">Add student</a>
            {/if}
            <a class="nav-item nav-link _redirect" href="#" data-url="personal-data">Personal Data</a>
            <a class="nav-item nav-link _logout" href="#" data-url="logout">Logout <img src="../img/logout-white.png" width="24" height="24" class="d-inline-block" alt=""></a>
            </div>
        </div>
    </nav>
</div>