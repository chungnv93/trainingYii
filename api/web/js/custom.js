function myFunction() {
    var idUser = $('#idCate').val();
    alert(idUser);
    $.ajax({
        url:'?r=category/delete'+ {id},
        type:"POST",
        data:"id = 1",
        dataType:"json",
        success:function(data){
            if(data==null){
                console.log('a');
            }else{
                console.log(data);
            }
        }
    });
}