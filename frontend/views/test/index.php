<?php


?>

<div class="chat-window">
    <div id="chat-content" class="chat-content">

    </div>
    <div class="input-group">
        <input type="text" id="chat-input" class="form-control">
        <span class="app"></span>
    </div>
</div>

<script>
    var wxhost = "127.0.0.1";
    var wxport = 80;


    $(document).keypress(function (event) {
        if(event.keyCode==13){
            var val=$('#chat-input').val();
        }
    });

</script>