<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Your Mumbership</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="req/_hendesignup.php" METHOD="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="frist_name" class="form-label">Frist Name</label>
                        <input type="text" name="frist_name" class="form-control" id="frist_name" Required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name">
                    </div>
                    <div class="col-md-6">
                        <label for="useremail" class="form-label">Email Address</label>
                        <input type="email" name="user_email" class="form-control" id="useremail" Required>
                    </div>
                    <div class="col-md-6">
                        <label for="phonenumber" class="form-label">Phone Number</label>
                        <input type="number" name="phone_num" class="form-control" id="phonenumber">
                    </div>
                    <div class="col-md-6">
                        <label for="user_Password" class="form-label">Password</label>
                        <input type="password" name="user_pass" class="form-control" id="user_Password" Required>
                    </div>
                    <div class="col-md-6">
                        <label for="Con_password" class="form-label">Conform Password</label>
                        <input type="password" name="con_pass" class="form-control" id="Con_password" Required>
                    </div>

                    <div class="col-12">
                        <label for="uesr_address" class="form-label">Address</label>
                        <input type="text" name="assress" class="form-control" id="uesr_address"
                            placeholder="1234 Main St">
                    </div>
                    <div class="col-md-6">
                        <label for="user_city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" id="user_city">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">State</label>
                        <select name="select" id="inputState" class="form-select">
                            <option value="Choose1" selected>Choose1</option>
                            <option value="Choose2" >Choose2</option>
                            <option value="Choose♥2" >Choose♥2</option>
                            <option value="Choose☻" >Choose☻</option>
                            <option value="Choose◘" >Choose♣</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="user_Zip" class="form-label">Zip</label>
                        <input type="text" name="zip" class="form-control" id="user_Zip">
                    </div>
                    <div class="col-6">
                        <label for="formFileSm" class="form-label">Profile Picture</label>
                        <input class="form-control form-control-sm" name="formFileSm" id="formFileSm" type="file" Required>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" Required>
                            <label class="form-check-label" for="gridCheck">
                                <p>Aggry Website Rules & Conditions</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Registration</button>
                    </div>
                    <div class="col-8">
                        <div class="form-footer">
                            <a href="login.php" class="btn btn-primary">login</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>