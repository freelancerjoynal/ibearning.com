@extends('admin.layout.app')
@section('title')
    Aprove the Work
@endsection
@section('style')
    
@endsection
@section('content')
    <div class="absolute-middle">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Open the Options
        </button>
        <br> <br>
        <a href="" class="btn btn-danger">Go Back</a>
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Aprove and send PV</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <form action="/web-admin/working-zone/aprove-done" method="POST">
                    @csrf
                    <input name="customerid" type="hidden" value="{{$customerid}}">
                    <input name="workid" type="hidden" value="{{$workid}}">
                    <label for="point">Amount of PV</label>
                    <input id="point" name="point" type="number" value="5" class="form-control" required>
                    <button type="submit" class="btn btn-dark mt-1">Aprove</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
@endsection