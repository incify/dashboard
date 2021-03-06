@extends('layouts.app')

@section('content')
<div><div class="d-sm-flex">
  <div class="w w-auto-xs light bg bg-auto-sm b-r">
    <div class="py-3">
      <div class="nav-active-border left b-primary">
        <ul class="nav flex-column nav-sm">
          <li class="nav-item">
            <a class="nav-link active" href="#" data-toggle="tab" data-target="#tab-1">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab-2">Account Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab-3">Emails</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab-4">Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab-5">Security</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col p-0"><div class="tab-content pos-rlt">
    <div class="tab-pane active" id="tab-1">
      <div class="p-4 b-b _600">Public profile</div>
      <form role="form" class="p-4 col-md-6">
        <div class="form-group">
          <label>Profile picture</label>
          <div class="form-file">
            <input type="file">
            <button class="btn white">Upload new picture</button>
          </div>
        </div>
        <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>URL</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Company</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Location</label>
          <input type="text" class="form-control">
        </div>
        <div class="checkbox">
          <label class="ui-check">
            <input type="checkbox"><i class="dark-white"></i> Available for hire
          </label>
        </div>
        <button type="submit" class="btn primary mt-2">Update</button>
      </form>
    </div>
    <div class="tab-pane" id="tab-2">
      <div class="p-4 b-b _600">Account settings</div>
      <form role="form" class="p-4 col-md-6">
        <div class="form-group">
          <label>Client ID</label>
          <input type="text" disabled="disabled" class="form-control" value="d6386c0651d6380745846efe300b9869">
        </div>
        <div class="form-group">
          <label>Secret Key</label>
          <input type="text" disabled="disabled" class="form-control" value="3f9573e88f65787d86d8a685aeb4bd13">
        </div>
        <div class="form-group">
          <label>App Name</label>
          <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>App URL</label>
          <input type="text" class="form-control">
        </div>
        <button type="submit" class="btn primary m-t">Update</button>
      </form>
    </div>
    <div class="tab-pane" id="tab-3">
      <div class="p-4 b-b _600">Emails</div>
      <form role="form" class="p-4 col-md-6">
        <p>E-mail me whenever</p>
        <div class="checkbox">
          <label class="ui-check">
            <input type="checkbox"><i class="dark-white"></i> Anyone posts a comment
          </label>
        </div>
        <div class="checkbox">
          <label class="ui-check">
            <input type="checkbox"><i class="dark-white"></i> Anyone follow me
          </label>
        </div>
        <div class="checkbox">
          <label class="ui-check">
            <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
          </label>
        </div>
        <div class="checkbox">
          <label class="ui-check">
            <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
          </label>
        </div>
        <button type="submit" class="btn primary mt-2">Update</button>
      </form>
    </div>
    <div class="tab-pane" id="tab-4">
      <div class="p-4 b-b _600">Notifications</div>
      <form role="form" class="p-4 col-md-6">
        <p>Notice me whenever</p>
        <div class="checkbox">
          <label class="ui-check">
            <input type="checkbox"><i class="dark-white"></i> Anyone seeing my profile page
          </label>
        </div>
        <div class="checkbox">
          <label class="ui-check"><input type="checkbox">
            <i class="dark-white"></i> Anyone follow me
          </label>
        </div>
        <div class="checkbox">
          <label class="ui-check">
            <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
          </label>
        </div>
        <div class="checkbox">
          <label class="ui-check">
            <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
          </label>
        </div>
        <button type="submit" class="btn primary mt-2">Update</button>
      </form>
    </div>
    <div class="tab-pane" id="tab-5">
      <div class="p-4 b-b _600">Security</div>
      <div class="p-4">
        <div class="clearfix">
          <form role="form" class="col-md-6 p-0" _lpchecked="1">
            <div class="form-group">
              <label>Old Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="form-group">
              <label>New Password Again</label>
              <input type="password" class="form-control">
            </div>
            <button type="submit" class="btn primary mt-2">Update</button>
          </form>
        </div>
        <p class="mt-4"><strong>Delete account?</strong></p>
        <button type="submit" class="btn danger m-t" data-toggle="modal" data-target="#modal">Delete Account</button>
      </div>
    </div>
  </div>
</div>
</div>
<div id="modal" class="modal fade animate black-overlay" data-backdrop="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content flip-y">
      <div class="modal-body text-center">
        <p class="py-3 mt-3">
          <i class="fa fa-remove text-warning fa-3x"></i>
        </p>
        <p>Are you sure to delete your account?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn white" data-dismiss="modal">No</button>
         <button type="button" class="btn danger" data-dismiss="modal">Yes</button>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection

@section('footer_scripts')
@endsection
