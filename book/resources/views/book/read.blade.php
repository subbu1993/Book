@extends('layouts.master')

@section('content')
header('content-type:application/pdf');
echo file_get_contents($filename);
@endsection
