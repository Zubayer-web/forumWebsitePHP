
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login Modal </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="req/_hendelogin.php" METHOD="POST">
                    <div class="mb-3">
                        <label for="loginemail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="loginemail" id="loginemail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="loginPassword" id="loginPassword">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="logincheck" required>
                        <label class="form-check-label" for="logincheck">Aggry Website Rules & Conditions</label>
                    </div>
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                
            </div>
        </div>
    </div>
</div>