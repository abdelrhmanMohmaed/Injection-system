
{{--  Delete All Selected Record  --}}
<script>
    $(function (e){
        var allIds = [];

        $("#selectAllIds").click(function (){
            $('.checkbox_ids').prop('checked',$(this).prop('checked'));
        });

        $('#deleteAllSelectedRecord').click(function (e){
            e.preventDefault();

            $("#deleteAllSelectedRecord").removeAttr("disabled");
            $('input:checkbox[name=ids]:checked').each(function (){

                allIds.push($(this).val());
            });

            $.ajax({
                url: '{{route('posts.destroy')}}',
                type: 'post',
                data: {
                    ids: allIds,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success){
                        location.reload();
                    }else {
                        console.log(response)
                    }
                }
            });
        })
    });
</script>
{{--  Delete All Selected Record  --}}
