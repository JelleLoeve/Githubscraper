@extends('layout')

@section('content')


<form action="addaccounts.php" method="post">
	naam: <input type="text" name="naam"><br>
	link: <input type="text" name="diagramlink"><br>
	<input type="submit" value="Submit" name="submit"">
</form>

@endsection