  
<?php
require "konekcija.php";
require "kolaci.php";
session_start();
if (isset($_SESSION['user_data'])) {
} else {
  header('Location: http://localhost/domaci/login.php');
}

$result = Kolaci::getSpojene($dblink);
$result1 = Kategorija::getAll($dblink);
if($result->num_rows==0){
  echo "prazna tabela";
  die();
}else{
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link rel="stylesheet" href="css/stylee.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Kolaci
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.2.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />
</head>

<body class="off-canvas-sidebar">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          
          <li class="nav-item active">
            <a href="login.php" class="nav-link">
              <i class="material-icons">fingerprint</i>
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('assets/img/kolaci.jpg'); background-size: cover; background-position: top center;">
      <div class="container">
        <div class="row">
          
                <!-- Tabela -->
                <div id="pregled">
                    
                    
                    <div >
                      
                      <!-- Doadaj dugme -->
                    <div class="col-md-2" style="text-align: center; width: 25%; float: left;">
                        
                        <button class="open-button" onclick="openForm()">Dodaj</button>

                            
                          <div class="form-popup" id="myForm">
                            <form id="addForm" method="post" action="#" class="form-container">
                             
                              <label for="psw"><b>Naziv kolaca</b></label>
                              <input type="text" id="nazivKolaca" placeholder="Uneti naziv kolaca" name="psw" required>

                              <label for="psw"><b>Sadrzaj(Opis)</b></label>
                              <input type="text" id="opisKolaca" placeholder="Uneti opis kolaca" name="psw" required>
                              
                              <label for="psw"><b>Cena</b></label>
                              <input type="text" id="cenaKolaca" placeholder="Uneti cenu kolaca" name="psw" required>

                              <label for="psw"><b>Posan (da/ne)</b></label>
                              <input type="text" list="posno" name="" id="posnoKolac" >
                              <datalist  id="posno">
                                <option value="da">Da</option>
                                <option value="ne">Ne</option>
                              </datalist>
                                <br><br>

                              <label for="psw"><b>Kategorija</b></label><br>
                              <input type="text" list="kategorije" name="" id="kategorijaKolac" >
                              <datalist id="kategorije">
                                <?php
                                while ($row1 = $result1->fetch_object()){
                                ?>
                                <option value="<?php echo $row1->id;?>"><?php echo $row1->naziv;?></option>
                                

                                <?php }?>
                              </datalist>

                              
                              <button  type="submit" class="btn" id="btnAdd">Dodaj</button>

                              
                              <button type="button" class="btn cancel" onclick="closeForm()">Zatvori</button>
                            </form>
                            </div>

                                  <!--UPDATE FORMA-->
                            <div class="form-popup" id="myFormUpd">
                            <form id="updForm" method="post" action="#" class="form-container">

                              <label for="psw"><b>ID Kolaca</b></label>
                              <input type="text" id="idKolac" placeholder="Uneti postojeci id kolaca" name="psw" required>

                              <label for="psw"><b>Naziv kolaca</b></label>
                              <input type="text" id="nazivKolaca1" placeholder="Uneti naziv kolaca" name="psw" required>

                              <label for="psw"><b>Sadrzaj(Opis)</b></label>
                              <input type="text" id="opisKolaca1" placeholder="Uneti opis kolaca" name="psw" required>
                              
                              <label for="psw"><b>Cena</b></label>
                              <input type="text" id="cenaKolaca1" placeholder="Uneti cenu kolaca" name="psw" required>

                              <label for="psw"><b>Posan (da/ne)</b></label>
                              <input type="text" list="posno" name="" id="posnoKolac1" >
                              <datalist  id="posno">
                                <option value="da">Da</option>
                                <option value="ne">Ne</option>
                              </datalist>
                                <br><br>

                              <label for="psw"><b>Kategorija</b></label><br>
                              <input type="text" list="kategorije" name="" id="kategorijaKolac1" >
                              <datalist id="kategorije">
                                <?php
                                while ($row1 = $result1->fetch_object()){
                                ?>
                                <option value="<?php echo $row1->id;?>"><?php echo $row1->naziv;?></option>
                                

                                <?php }?>
                              </datalist>

                              
                              <button  type="submit" class="btn" id="btnUpd">Izmeni</button>

                              
                              <button type="button" class="btn cancel" onclick="closeFormUpd()">Zatvori</button>
                            </form>
                          </div>

                    </div>

                    <div class="col-md-2" style="text-align: center; width: 25%; float: left;">
                        <button id="btn-izmeni" class="btn btn-normal" onclick="sortTable()">Sort naziv</button>
                    </div>
                    </div>  
                    <br>
                    <table id="tabela" class="table table-hover table-bordered sortable">
                    <thead>
                        <tr>
                           <th scope="col">ID</th>
                           <th scope="col">Naziv kolaca</th>
                           <th scope="col">Sadrzaj</th>
                           <th scope="col">Cena</th>
                           <th scope="col">Posan</th>
                           <th scope="col">Kategorija</th>
                           <th scope="col" colspan="2">Operacije</th>
                        </tr>
                     </thead>
                     <tbody id="red">
                    <?php
                    while ($row = $result->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["naziv"] ?></td>
                            <td><?php echo $row["opis"] ?></td>
                            <td><?php echo $row["cena"] ?></td>
                            <td><?php echo $row["posno"] ?></td>
                            <td><?php echo $row["nazivKat"] ?></td>
                            <td>
                                <a href="#" onclick="openFormUpd()" id="btnupdate" data-id=<?php echo $row["id"] ?> ><i class="fas fa-edit" <?php echo $row["id"] ?>></i></a>
                            </td>
                            <td>
                                <a href="#" id="btndelete" data-id=<?php echo $row["id"] ?>><i class="fas fa-trash" <?php echo $row["id"] ?>></i></a>
                            </td>
                        </tr>
                <?php
                    }
                  }
                ?>
                </tbody>
            </table>

       
      
                  <!-- main section to display products: -->

                  
             
           
          </div>
        </div>
      </div>
     
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.2.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
  
  <!--<script src="main.js"></script>-->
  
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>
  <script>
          $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            var data = new FormData($(this)[0]);
            data.append('action', 'login');
            var form = $(this);
            form.find(':submit').attr('disabled', true);
            var url = "login.php";
            $.ajax({
              type: 'POST',
              url: url,
              data: data,
              dataType: 'JSON',
              processData: false,
              contentType: false,
              error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
              },
              success: function(response) {
                console.log(response);
                form.find(':submit').attr('disabled', false);
                if (response.error_status == 1) {
                  form.find('small').text('');
                  // If validation error exists
                  for (var key in response) {
                    var errorContainer = form.find(`#${key}Error`);
                    if (errorContainer.length !== 0) {
                      errorContainer.html(response[key]);
                    }
                  }
                }
                if (response.status == 1) {
                  form.trigger('reset');
                  form.find('small').text('');
                  // handling success response
                  window.location.href = 'index.php';

                } else if (response.status == 0) {
                  // Handling failure response
                  toastr.error(response.msg);
                }
              }
            });
          });

          
          function openForm() {
            document.getElementById("myForm").style.display = "block";

          }

          function openFormUpd() {
            document.getElementById("myFormUpd").style.display = "block";
          }


          function closeForm() {
            document.getElementById("myForm").style.display = "none";
          }

          function closeFormUpd() {
            document.getElementById("myFormUpd").style.display = "none";
          }

          // Za dodavanje

          $(document).ready(function() {
            $('#btnAdd').on('click', function() {
              $("#btnAdd").attr("disabled", "disabled");
                  
              var naziv = $('#nazivKolaca').val();
              var opis = $('#opisKolaca').val();
              var cena = $('#cenaKolaca').val();
              var posno = $('#posnoKolac').val();
                  var kategorija = $('#kategorijaKolac').val();
                  console.log(naziv);
                  console.log(opis);
                  console.log(cena);
                  console.log(posno);
                  console.log(kategorija);
              if(naziv!="" && opis!="" && cena!="" && posno!="" && kategorija!=""){
                      console.log("usao u if");
                $.ajax({
                  url: "add.php",
                  type: "POST",
                  data: {
                    naziv: naziv,
                    opis: opis,
                    cena: cena,
                    posno: posno,
                              kategorija:	kategorija			
                  },
                  cache: false,
                  success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                      $("#butsave").removeAttr("disabled");
                      $('#addForm').find('input:text').val('');
                      $("#success").show();
                      $('#success').html('Data added successfully !'); 	
                                  console.log("uspesno upisao");					
                    }
                    else if(dataResult.statusCode==201){
                      alert("Error occured !");
                    }
                    
                  }
                });
              }
              else{
                alert('Please fill all the field !');
              }
            });
          });

          // Za brisanje


          $(document).on("click", "#btndelete", function() { 
            var $ele = $(this).parent().parent();
                console.log($(this).attr("data-id"));
            $.ajax({
              url: "delete.php",
              type: "POST",
              cache: false,
              data:{
                id: $(this).attr("data-id")
                        
              },
              success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                  $ele.fadeOut().remove();
                }
              }
            });
          });

          // Za update

          $(document).ready(function() {
            $('#btnUpd').on('click', function() {
              $("#btnUpd").attr("disabled", "disabled");
                  
              var id = $('#idKolac').val();
              var naziv = $('#nazivKolaca1').val();
              var opis = $('#opisKolaca1').val();
              var cena = $('#cenaKolaca1').val();
              var posno = $('#posnoKolac1').val();
                  var kategorija = $('#kategorijaKolac1').val();
                  console.log(id);
                  console.log(naziv);
                  console.log(opis);
                  console.log(cena);
                  console.log(posno);
                  console.log(kategorija);
              if(naziv!="" && opis!="" && cena!="" && posno!="" && kategorija!=""){
                      console.log("usao u if");
                $.ajax({
                  url: "update.php",
                  type: "POST",
                  data: {
                    id: id,
                    naziv: naziv,
                    opis: opis,
                    cena: cena,
                    posno: posno,
                    kategorija:	kategorija			
                  },
                  cache: false,
                  success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                      $("#butsave").removeAttr("disabled");
                      $('#addForm').find('input:text').val('');
                      $("#success").show();
                      $('#success').html('Data updated successfully !'); 	
                                  console.log("uspesno upisao");					
                    }
                    else if(dataResult.statusCode==201){
                      alert("Error occured !");
                    }
                    
                  }
                });
              }
              else{
                alert('Please fill all the field !');
              }
            });
          });
          
          //SORTIRANJE
          function sortTable() {
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementById("tabela");
                switching = true;

                while (switching) {
                    switching = false;
                    rows = table.rows;
                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        x = rows[i].getElementsByTagName("TD")[1];
                        y = rows[i + 1].getElementsByTagName("TD")[1];
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
            }

  </script>
  
</body>

</html>