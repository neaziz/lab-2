<?php 
error_reporting(-1);
echo "<pre>";
        print_r($_SERVER);
        echo "</pre>";
if(isset($_POST['vehicle1']) == "ok"){
    if(isset($_POST['send'])){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

    }
    echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        if(!empty($_FILES)){
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $_FILES['photo']['name']);
        }
       

       /* if (!move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            sprintf('/uploads/%s.%s',
                sha1_file($_FILES['photo']['tmp_name']),
                
            )
        )) {
            throw new RuntimeException('Failed to move uploaded file.');
        }*/
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  float: right;
}
#borderimg { 
  border: 10px solid transparent;
  padding: 15px;
  border-image: url(border.png) 30 round;
}
div.polaroid {
  width: 80%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
}

div.container {
  text-align: center;
  padding: 10px 20px;
}
</style>
</head>
<body>

<h2>(EN)Create an account</h2>
<h2>(RU)Создать Учетную запись</h2>

<div class="container">
  <form method="post" action="" enctype="multipart/form-data">
  <div class="row">
    <div class="col-25">
      <label for="lname" >photo</label>
    </div>
    <div class="col-75">
      <input type="file" id="lname" name="photo" placeholder="Your last name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" placeholder="Your name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname" >Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="country">Country</label>
    </div>
    <div class="col-75">
      <select id="country" multiple="" name="leng[]">
        <option value="kyrgyzstan">Kyrgyzstan</option>
        <option value="kazakhstan">Kazakhstan</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Subject</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
    </div>
    
  </div>
  <div class="col-75">
    <input type="checkbox" id="vehicle1" name="vehicle1" value="ok">
    <label for="vehicle1"> I am not a robot</label><br>
  </div>
  <br>
  <div class="row">
  <button type="submit" name="send" value="test" class="button">Send</button>
    
  </div>
  </form>
</div>
<?php 
   
    $photo =$_SERVER['QUERY_STRING'].'uploads/'.$_FILES['photo']['name'];
?>
<div class="polaroid">
  <img src="<?=$photo;?>" alt="5 Terre" style="width:100%">
  <div class="container">
  <p>First Name:<?php if(!empty($_POST["firstname"])) echo $_POST["firstname"]; else echo "form not submitted"?></p>
  <p>Last name:<?php if(!empty($_POST['lastname'])) echo $_POST['lastname']; else echo "form not submitted" ?></p>
  </div>
</div>

  
  <p>
		<?php if(isset($_POST['vehicle1']) && $_POST['vehicle1'] == 'ok') echo 'Чекбокс отмечен' ?>
	</p>
  <template><?php if(!empty($_POST['subject'])) echo $_POST['subject']; else echo "form not submitted"?></template>
</body>
</html>