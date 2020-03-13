function getExists(){
    $.get("getcontacts.php", function(data){
        $("table").append(data);
        $("tr input").prop("disabled", true);
        $("tr input").prop('required', true);

        $(".edit").click(function(){
         $(this).closest("tr").find('.recname').prop("disabled", false);
         $(this).closest("tr").find('.recnum').prop("disabled", false);
     });
           $("td").keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            var name = $(this).closest("tr").find(".recname");
            var num = $(this).closest("tr").find(".recnum");
            var id = $(this).closest("tr").find(".recid");
            if(keycode == '13'){
                if(name.val().match(/^[0-9]*$/) || num.val().match(/^[a-zA-Z]*$/) || num.val().length !== 11 || /\s/.test(num.val())){
                    alert("Invalid input");
                }else{
                    $.post("phone_book.php", {mode: 'update', id: id.val(), name: name.val(), num: num.val()}, function(data){
                        $("tr input").prop("disabled", true);
                        alert(data+" was updated");
                    });
                }
            }
        });
        $(".del").click(function(){
            var name = $(this).closest("tr").find(".recname");
            var num = $(this).closest("tr").find(".recnum");
            var id = $(this).closest("tr").find(".recid");
            $.post("phone_book.php", {mode: 'delete', name: name.val(), num: num.val(), id: id.val()}, function(data){
                alert(data+" deleted");
                location.reload();
            });
        });
    });
}
//////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    getExists();
    $("#suggest").focusin(function(){
        $("tr").not(':first').remove();
        $("#suggest").keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            var key = $("#suggest").val();
            if(keycode == '13'){
                $.post("suggestion.php", {key: key}, function(data){
                    $("tr").not(':first').remove();
                    $("table").append(data);
                    $("tr input").prop("disabled", true);
                    $("tr input").prop('required', true);
                    $(".edit").click(function(){//edit-button clicked, the input will be enabled
                        $(this).closest("tr").find('.recname').prop("disabled", false);
                        $(this).closest("tr").find('.recnum').prop("disabled", false);
                    });
                    $("td").keypress(function(event){//press enter to save edited record
                        var keycode = (event.keyCode ? event.keyCode : event.which);
                        var name = $(this).closest("tr").find(".recname");
                        var num = $(this).closest("tr").find(".recnum");
                        var id = $(this).closest("tr").find(".recid");
                        if(keycode == '13'){//validation validation validation
                            if(name.val().match(/^[0-9]*$/) || num.val().match(/^[a-zA-Z]*$/) || num.val().length !== 11 || /\s/.test(num.val())){
                            alert("Invalid input");
                            }else{
                                $.post("phone_book.php", {mode: 'update', id: id.val(), name: name.val(), num: num.val()}, function(data){
                                    $("tr input").prop("disabled", true);
                                    alert(data+" was updated");
                                });
                            }
                        }
                    });
                    $(".del").click(function(){//delete the record
                        var name = $(this).closest("tr").find(".recname");
                        var num = $(this).closest("tr").find(".recnum");
                        var id = $(this).closest("tr").find(".recid");
                        $.post("phone_book.php", {mode: 'delete', name: name.val(), num: num.val(), id: id.val()}, function(data){
                            alert(data+" deleted");
                            location.reload();
                        });
                    });
                });
            }
        });
    });
    $(".heading span").click(function(){
        $("tr").not(':first').remove();
        $("#suggest").val("");
        getExists();
    });
    $("#add").click(function(){
        $(".new").toggle(300, function(){
            ($("#add").text()=="Cancel")?$("#add").text("New"):$("#add").text("Cancel");
        });
    });
    $("#submit").click(function(){
        // /^[0-9]*$/ /^[a-zA-Z ]*$/
        if(!$("#name").val().match(/^[0-9]*$/) && !$("#num").val().match(/^[a-zA-Z ]*$/) && !$("#num").val().length !== 11 && !$("#num").val().match(/\s/g)){
            $.post("phone_book.php", {mode: 'insert', name: $("#name").val(), num: $("#num").val()}, function(data){
                alert(data+" was added!");
                location.reload();
            });
        }else{
            alert("Invalid Input!");
        }
    });
});