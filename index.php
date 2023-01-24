<!DOCTYPE html>
<html>
<head>
    <tittle>Upload Image</tittle>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
</head>
<style media="screen">
    .preview{
        display: block;
        width: 150px;
        height: 150px;
        border: 1px solid black;
        margin-top: 10px;
    }
    .upload img{
  border-radius: 50%;
  border: 8px solid #DCDCDC;
}
.upload .round{
  position: absolute;
  background: #00B4FF;
  bottom: 0;
  right: 0;
  width: 32px;
  height: 32px;
  line-height: 33px;
  text-align: center;
  border-radius: 50%;
  overflow: hidden;
}
.upload.round input[type="file"]{
  position: absolute;
  transform: scale(2);
  opacity: 0;
}
input type[type="file"]::-webkit-file-upload button{
  cursor: pointer;
}
</style>
<body>
   <form enctype="multipart/form-data" action="" method="post">
     <input type="file" name="fileImg" id="fileImg">
     <button type="button" onclick="submitData();">submit</button>
     <div class="preview">
        <img src="" id="img" alt="preview" style="width: 100%; height:100%;">
        <i class="fa fa-camera" style="color:#fff"></i>
     </div>
   </form>
   
   <script type="text/javascript">
    fileImg.onchange = evt => {
        const [file] = fileImg.files;
        if(file) {
            img.src = URL.createObjectURL(file);
        }
    }
    function submitData(){
      $(document).ready(function(){
        var formData = new FormData ();
        var files = $('#fileImg')[0].files;
        formData.append('FileImg', files[0]);

        $.ajax({
          url: 'function.php',
          type: 'post',
          data: formData,
          contentType: false,
          processData: false,
          success:function(response){
            if(response == "success"){
                alert("Successfully Added");
            }
            else if(response == "Invalid"){
                alert("Invalid Extentsion!");
            }
            else{
                alert("Please Fill Out The Form");
            }
          }
        });
      });
    }
   </script>
</body>
</html>