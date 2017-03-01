<style>
#main {
  background-image: url(/IS3102_Final/img/intrasysLogin2.jpg); 

  background-size: cover;

}
#box {
  border-radius: 15px ;  
  background-color: rgba(255,255,255,.9); 
  overflow: hidden;
}
#form_box {
  padding: 0;
  border-radius:10px;
  overflow: hidden;
}
#login_form, #resetPass_form{
  padding: 15px;
}
.content{
  padding-top: 60px;
  padding-bottom: 60px;
}
</style>

<?= $this->Element('intrasysLeftSideBar'); ?>

<!-- Main content -->
<div class="content-wrapper" id = "main">
  <section class="content">
    <div class="row">
      <div class="index large-8 medium-4 large-offset-2 medium-offset-4 columns content">
        <div class="box box-primary" id="box">
          <div class="box-header with-border">
          <br><br>
            <h1 class="text-center">Welcome to Intrasys CLRMS!</h1>
            <hr>
            <h3 class="text-center">Provider of RFID Solutions | RFID Readers | RFID Solutions Singapore</h3>
            <!--<div class="panel panel-default " id="form_box">
              <div class="panel-heading">
                <h2 id="loginheading" class="panel-title text-center"></h2>   
              </div>
              <br>
            </div>-->
          <br><br>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>