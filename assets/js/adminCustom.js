$(function(){
        $(document).ready(function (){
        $('.deluser').click(function (){
            var id = $(this).data('id');
            var text = $(this).data('text');
            $.ajax({
                type: 'POST',
                url:surl+'admin/deleteUser',
                data: {
                    id:id,
                    text:text
                },
                success:function (data){
                    console.log(data)
                },
                error:function (){

                }
            });
        });
    });
})