	<!-- start: Page Title -->
	<div id="page-title">
            <div id="page-title-inner">
                <!-- start: Container -->
                <div class="container">
                        <h2><i class="ico-user ico-white"></i>Login Member</h2>
                </div>
                <!-- end: Container  -->
            </div>	
	</div>
	<!-- end: Page Title -->

        <!--start: Wrapper-->
        <div id="wrapper">
            <!--start: Container -->
            <div class="container">
                <!-- start: Row -->
                <div class="row">
                    <form class="form-horizontal" name="frmlogin" action="login_cek.php" method="POST">
                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input type="email" name="user" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputPassword">Password</label>
                        <div class="controls">
                            <input type="password" name="pass" id="inputPassword" placeholder="Password">
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="controls">
                          <button type="submit" class="btn btn-success">Sign in</button>
                        </div>
                        <div class="controls" style="font-size: medium; margin-top: 10px;">Belum Menjadi Member ..?
                            <br><a href="index.php?link=memberform" class="btn">Click Disini</a> untuk menjadi member.
                        </div>
                      </div>
                    </form>
                </div>
                <!-- end: Row -->
            </div>
            <!--end: Container-->
        </div>
        <!-- end: Wrapper  -->			
