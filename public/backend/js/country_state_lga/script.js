$('document').ready(function() {
    $('#country').change(function(){
        var country_id = $(this).val();
        $("#state > option").remove();
        $.ajax({
            type: "POST",
            url: "country_state_lga_populate_data.php",
            data: "cid=" + country_id,
            success:function(opt){
                $('#state').html(opt);
                $('#lga').html('<option value="0">Select LGA</option>');
            }
        });
    });

    $('#state').change(function(){
        var state_id = $(this).val();
        $("#lga > option").remove();
        $.ajax({
            type: "POST",
            url: "country_state_lga_populate_data.php",
            data: "sid=" + state_id,
            success:function(opt){
                $('#lga').html(opt);
            }
        });
    });
});