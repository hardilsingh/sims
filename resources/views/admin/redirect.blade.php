@extends("layouts.admin")

<a href="" id="id" onclick="message()" target="_blank"></a>


@section("content")
<h1 class="display-4 text-center">
    Generating Reciept Please Wait.....

</h1>
@stop

@section("script-plugins")

<script type="text/javascript">
    var val = <?php echo $_GET['id'] ?>;

    function message() {
        window.location.href = "/reciepts/" + val;

    }
    $(document).ready(function() {
        $('#id').trigger('click');
    });
</script>


@stop