@extends('ctheme')
@section('content')
<div style="margin-left:300px;">
<form action="changepassword" method="post">
                {{csrf_field()}}
<table class="table table borderless" style="width:400px;">
<tr>
    <td>Old Password :</td>
    <td><input type="password" class="form-control" name="oldpass" required></td>
</tr>
<tr>
    <td>New Password :</td>
    <td><input type="password" class="form-control" name="newpass" required></td>
</tr>
<tr>
    <td>Confirm New Password :</td>
    <td><input type="password" class="form-control" name="cnewpass" required></td>
</tr>
<tr>
    <td></td>
    <td><button class="btn btn-dark">Confirm</button></td>
</tr>

</table>
</form>
</div>
@endsection