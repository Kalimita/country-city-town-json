<html>
<head>
    <title>İl ilçe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12"><h1>İl ilçe</h1></div>
        <div class="col-md-3">
            <select name="il" id="il" class="form-control">
                <option value="">Seçin...</option>
            </select>
        </div>

        <div class="col-md-3">
            <select name="ilce" id="ilce" class="form-control" disabled="disabled">
                <option value="">Seçin...</option>
            </select>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $.getJSON("il-bolge.json", function(sonuc){
        $.each(sonuc, function(index, value){
            var row="";
            row +='<option value="'+value.il+'">'+value.il+'</option>';
            $("#il").append(row);
        })
    });


    $("#il").on("change", function(){
        var il=$(this).val();

        $("#ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
        $.getJSON("il-ilce.json", function(sonuc){
            $.each(sonuc, function(index, value){
                var row="";
                if(value.il==il)
                {
                    row +='<option value="'+value.ilce+'">'+value.ilce+'</option>';
                    $("#ilce").append(row);
                }
            });
        });
    });
/* YA DA 

$(document).ready(function(){
        $('#ulke').on('change', function(){
            var ulkeID = $(this).val();
            if(ulkeID){
                $.ajax({
                    type: 'POST',
                    url: 'action.php',  // Post isteğini işleme alacağınız sayfa
                    data: 'ulke_id=' + ulkeID,
                    success: function(html){
                        $('#il').html(html);
                        $('#ilce').html('<option value="">Bekleniyor..</option>');
                    }
                });
            }else{
                $('#il').html('<option value="">Bekleniyor..</option>');
                $('#ilce').html('<option value="">Bekleniyor..</option>');
            }
		});
    
   $('#il').on('change', function(){
            var ilID = $(this).val();
            if(ilID){
                $.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: 'il_id=' + ilID,
                    success: function(html){
                        $('#ilce').html(html);
                    }
                });
            }else{
                $('#ilce').html('<option value="">Bekleniyor..</option>');
            }
      });
      
    */
</script>
</body>
</html>
