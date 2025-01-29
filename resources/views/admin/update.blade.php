@extends('layout')
   
@section('content')

<h4>Admin</h4>
<hr>
<h5>Edit Product</h5>
<hr>
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!--- idk why tf this isn't working --->
    <p>rip<p> 

    <button type="submit" class="btn btn-success">Update Product</button>
</form>
<br>
@endsection





