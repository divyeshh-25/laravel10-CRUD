<form class="row g-3 needs-validation mt-1" novalidate>
   <div class="row">
       <div class="col">
           <label class="form-check-label mb-1" for="fname">First Name</label>
           <input type="text" name="fname" id="fname" class="form-control" placeholder="First name" value="{{ $title == 'update' ? $employee->fname : '' }}">
           <span class="text-danger text-sm err" id="fname-err"></span>
       </div>
       <div class="col">
           <label class="form-check-label mb-1" for="lname">Last Name</label>
           <input type="text" name="lname" id="lname" class="form-control" placeholder="Last name" value="{{ $title == 'update' ? $employee->lname : '' }}">
           <span class="text-danger text-sm err" id="lname-err"></span>
       </div>
   </div>
   <div class="m-1">
       <label class="form-check-label">Gender</label><br>
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="gender" value="male" {{ $title == 'update' ? ($employee->sex == 'male' ? 'checked' : '') : 'checked' }} id="gender1"  style="cursor: pointer;">
           <label class="form-check-label" for="gender1"  style="cursor: pointer;">Male</label>
       </div>
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="gender" value="female" {{ $title == 'update' ? ($employee->sex == 'female' ? 'checked' : '') : '' }} id="gender2"  style="cursor: pointer;">
           <label class="form-check-label" for="gender2"  style="cursor: pointer;">Female</label>
       </div>
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="gender" value="other" {{ $title == 'update' ? ($employee->sex == 'other' ? 'checked' : '') : '' }} id="gender3"  style="cursor: pointer;">
           <label class="form-check-label" for="gender3"  style="cursor: pointer;">Other</label>
       </div>
   </div>
   <div class="row mb-2">
       <div class="col">
           <label class="form-check-label mb-1" for="phone">Phone Number</label>
           <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="{{ $title == 'update' ? $employee->phone : '' }}">
           <span class="text-danger text-sm err" id="phone-err"></span>
       </div>
       <div class="col">
           <label class="form-check-label mb-1" for="email">Email</label>
           <input type="email" name="email" class="form-control" placeholder="Email" id="email" value="{{ $title == 'update' ? $employee->email : '' }}">
           <span class="text-danger text-sm err" id="email-err"></span>
       </div>
   </div>
   <div class="row mb-2">
       <div class="col">
           <label class="form-check-label mb-1" for="dob">DOB</label>
           <input type="date" name="dob" class="form-control" id="dob" value="{{ $title == 'update' ? $employee->dob : '' }}">
           <span class="text-danger text-sm err" id="dob-err"></span>
       </div>
       <div class="col">
           <label class="form-check-label mb-1" for="salary">Salary</label>
           <input type="text" name="salary" class="form-control" placeholder="Salary" id="salary" value="{{ $title == 'update' ? $employee->salary : '' }}">
           <span class="text-danger text-sm err" id="salary-err"></span>
       </div>
   </div>
   <div class="m-1">
       <label class="form-check-label" for="inlineRadio1">Status</label><br>
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="status" id="status1" value="0"  {{ $title == 'update' ? ($employee->status == 0 ? 'checked' : '') : 'checked' }} style="cursor: pointer;">
           <label class="form-check-label" for="status1"  style="cursor: pointer;">Active</label>
       </div>
       <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="status" id="status2" value="1" {{ $title == 'update' ? ($employee->status == 1 ? 'checked' : '') : '' }}  style="cursor: pointer;">
           <label class="form-check-label" for="status2"  style="cursor: pointer;">Inactive</label>
       </div>
   </div>
   <div class="m-2">
       <input type="button" class="btn btn-primary" value="{{ $title == 'save' ? 'Save' : 'Update' }}"
       id="{{ $title == 'save' ? 'addEmployee' : 'updateEmployee' }}" data-id="{{ $title == 'update' ? $employee->id : '' }}">
   </div>
</form>
