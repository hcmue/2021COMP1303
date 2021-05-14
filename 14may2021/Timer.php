<div id="myclock">
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function(){
    const getTime = () => {
        $.ajax({
            url: 'GetTimer.php',
            type: 'GET',
            data: {},
            success: function(response){
                $("#myclock").html(response);
            },
            error: function(err){
                console.log(err);
            }
        });
    }
    getTime();
    setInterval(getTime, 1000);  
});
</script>