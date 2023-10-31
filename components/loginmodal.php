<!-- login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
      <p class="text-center small">Enter your username &amp; password to login</p>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="username">
            <label for="floatingInput">Username or Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="">
            <label for="floatingPassword">Password</label>
        </div>
        <p class="text-left small" style="margin-top: 1rem">Don't have account? <a href="#" style="color:blue" data-bs-toggle="modal" data-bs-target="#exampleregisterModal" >Create an account</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Access</button>
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="exampleregisterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
      <p class="text-center small">Enter your personal details to create account</p>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Fullname">
            <label for="floatingInput">Fullname</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Email">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-check" style="margin-top: 1rem">
            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required="">
            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#" style="color:blue" >terms and conditions</a></label>
            <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
        <p class="text-left small" style="margin-top: 1rem">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:blue">Log in</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

