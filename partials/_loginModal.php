<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Log In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/miniproject/partials/_handleLogin.php" method="POST">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="loginName" class="form-label">Username</label>
                        <input type="text" class="form-control" id="loginName" name="loginName"
                            aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="loginpass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginpass" name="loginpass">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </form>
        </div>

    </div>
</div>
</div>