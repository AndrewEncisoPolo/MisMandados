<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div id="container">
      <div class="address">
           <div class="input-reg rb-item input-group">
                 <span class="input-group-addon">Address </span>
                 <input type="text" class="form-control" placeholder="Insert text here">
           </div>
           <div align="center"><iframe class="map-img" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe></div>
       </div>
</div>
<div align="center" style="margin-top: 10px"><button id="btnAddAddress" class="btn btn-warning btn-md" type="button">Add Address</button></div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    $("#btnAddAddress").click(function () {
      $(".address").before('');
    });
</script>