<!-- Modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signUpModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/miniproject/partials/_handleSignUp.php" method="POST">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Username</label>
                            <input type="text" class="form-control" id="signUpEmail" name="signUpEmail"
                                aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signUppassword" name="signUppassword">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
                            <input type="password" class="form-control" id="signUpcpassword" name="signUpcpassword">
                        </div>

                        <button type="submit" class="btn btn-primary">Sign Up</button>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>