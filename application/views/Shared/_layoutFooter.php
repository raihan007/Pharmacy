                    </section><!-- /.content -->
                <div class="row footer-main">
                        Copyright &copy Talukder, Md. Raihan, 2016
                </div>
                <div id="wait" style="display:none;width:59px;height:79px;position:absolute;top:50%;left:50%;padding:2px;"><img src='<?= base_url('Assets/Images/demo_wait.gif') ?>' width="64" height="64" /><br>Loading..</div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!--post modal-->
        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div style="background-color: #5E9CF6;" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        Account Settings
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#ChangePassword" data-toggle="tab" aria-expanded="true">Change Password</a></li>
                            <li class=""><a href="#ChangeUsername" data-toggle="tab" aria-expanded="false">Change Username</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="ChangePassword">
                                <form class="ChangePasswordForm form-horizontal">
                                    <div class="form-group">
                                      <label for="oldPassword" class="col-lg-4 control-label">Current Password</label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="oldPassword" placeholder="Your Current Password">
                                        <span class="text-danger errorOldPassword"></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="newUsername" class="col-lg-4 control-label">New Password</label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="newPassword" placeholder="Your New Password">
                                        <span class="text-danger errorNewPassword"></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="confirmPassword" class="col-lg-4 control-label">Confirm Password</label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" id="confirmPassword" placeholder="Re-enter New Password">
                                        <span class="text-danger errorconfirmPassword"></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-lg-8 col-lg-offset-4">
                                        <button type="button" data-dismiss='modal' class="cancel btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="ChangeUsername">
                                <form action="<?= base_url('Users/ChangeUsername') ?>" id="ChangeUsernameForm" class="ChangeUsernameForm form-horizontal" method="post">
                                    <div class="form-group">
                                      <label for="oldUsername" class="col-lg-4 control-label">Current Username</label>
                                      <div class="col-lg-8">
                                        <input type="text" value="raihan" name="oldUsername" readonly="readonly" class="form-control" id="oldUsername" placeholder="Your Current Username">
                                        <span class="text-danger errorOldUsername"></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="newUsername" class="col-lg-4 control-label">New Username</label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" name="newUsername" id="newUsername" placeholder="Your New Username">
                                        <span class="text-danger errorNewUsername"></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="confirmUsername" class="col-lg-4 control-label">Confirm Username</label>
                                      <div class="col-lg-8">
                                        <input type="text" class="form-control" name="confirmUsername" id="confirmUsername" placeholder="Re-enter New Username">
                                        <span class="text-danger errorConfirmUsername"></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-lg-8 col-lg-offset-4">
                                        <button type="button" data-dismiss='modal' class="cancel btn btn-default">Cancel</button>
                                        <button type="button" name="_ChangeUsername" id="_ChangeUsername" class="btn btn-primary">Change Username</button>
                                      </div>
                                    </div>
                                    <label class="checkbox-inline"><input name="demo[]" type="checkbox" value="checkbox1">Option 1</label>
                                    <label class="checkbox-inline"><input name="demo[]" type="checkbox" value="checkbox2">Option 1</label>
                                    <label class="checkbox-inline"><input name="demo[]" type="checkbox" value="checkbox3">Option 2</label>
                                    <label class="checkbox-inline"><input name="demo[]" type="checkbox" value="checkbox4">Option 3</label>
                                </form>
                              </div>
                            </div>
                          </div>
                      </div>
                      </div>
                    </div>

    
    <script type="text/javascript" src="<?= base_url('Assets/js/jquery.min.js') ?>"></script>
    <!-- jQuery 2.0.2 -->
    <script type="text/javascript" src="<?= base_url('Assets/js/jquery.min.2.0.2.js') ?>"></script>
    <script src="<?= base_url('Assets/js/toastr.min.js') ?>"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
    
    <script type="text/javascript">
        var baseurl = "<?php print base_url(); ?>";
        /*var navClass = "<?php if(isset($class)){print $class;}?>";
        var navSubClass = "<?php if(isset($subClass)){print $subClass;}?>";
        $( document ).ready(function() {
            $('.sidebar-menu li').removeClass("active");
            var c = "."+navClass;
            var c1 = "."+navSubClass;
            $(c).addClass("active");
            $(c1).addClass("active");
            $('#UsersMenu').style.display ='block';
        });*/
    </script>
    <script src="<?= base_url('Assets/js/bootstrap3-typeahead.min.js') ?>"></script>  
    <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/settings.js') ?>"></script>
    <!-- Director App -->
    <script type="text/javascript" src="<?= base_url('Assets/js/Director/app.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Assets/js/moment.min.js') ?>"></script>
    <!-- Datetimepicker -->
    <script src="<?= base_url('Assets/bootstrap_datepicker/bootstrap-datetimepicker.min.js')?>" type="text/javascript"></script>
    <!-- bootstrap-table -->
    <script type="text/javascript" src="<?= base_url('Assets/js/bootstrap-table.js') ?>"></script>
    <!-- bootstrap-table-export -->
    <script type="text/javascript" src="<?= base_url('Assets/js/bootstrap-table-export.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Assets/js/tableExport.js') ?>"></script>
    
    
    
    
    <script type="text/javascript">
      $("#toastr").click(function(){
        // Display a warning toast, with no title
        toastr.warning('My name is Inigo Montoya. You Killed my father, prepare to die!');
      });
    </script>
    
    