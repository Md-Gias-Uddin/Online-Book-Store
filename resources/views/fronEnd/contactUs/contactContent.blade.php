@extends('fronEnd.master')
@section('mainContent')
<br>
<hr/>
<!-- contact -->
	<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 2px solid black;
}

table {
  border-collapse: collapse;
  width: 90%;
}



th {
  font-size: 1.875em;
}

td {
  font-size: 1.2em;
}

th{
  text-align: center;
}
td{
  text-align: center;
}</style>
</head>
<body>

<table>
  <tr>
	<th>Address</th>
	<th>Phone</th>
	<th>Email</th>
  </tr>
  <tr>
  	<td rowspan="2">2 No.Gate, Chittagong, Bangladesh</td>
  	<td>+9900034</td>
  	<td>info@gmail.com</td>
  </tr>
  <tr>
  	<td>+8800323</td>
  	<td>blog@gmail.com</td>
  </tr>
  
 
</table>

</body>
</html>

@endsection 